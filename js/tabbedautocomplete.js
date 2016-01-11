$(document).ready(function(){
	
    var tabbedAutocomplete = $('#mainsearch').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url: "/autocomplete/all/" + $('#mainsearch').val(),
          		dataType: "json",
          		type: 'get',
          		success: function( data ) {
					response( data );
				}
			});
		},
		sourceCategory: 'all',
		minLength: 3,
		focus: function( event, ui ) {
			if(typeof ui.item !== 'undefined') {
				ui.item.value = stripTags(ui.item.value);
			}
		},
		select: function( event, ui ) {
			//console.log(ui.item);
			if(ui.item) {
				document.location.href = ui.item.url;
				return false;
				$('#searchform').submit();
			}
		}
	}).data("ui-autocomplete");
     /* custom boostrap markup for items */
     tabbedAutocomplete._renderItem = function (ul, item) {
     	
     	
     	var widgetLink = '';
     	if(item.type == 'track') {
     		widgetLink = $('<a />')
     			.attr('class', 'trigger-modal')
     			.attr('href', '/markup/widget-trackcontrol?item='+ item.itemid )
     			.html(' TODO: <i class="fa fa-plus-square"></i>')
     			.bind('click', function(e){
     				e.preventDefault();
     				// TODO: unbind click event of whole item
     				// TODO: is it possible to use event listener which already exists on all .trigger-modal elements?
     				//$(this).parent().parent().parent().parent().unbind('click');
			        $.ajax({
						url: $(this).attr('href')
					}).done(function(response){
						$('#global-modal .modal-content').html(response);
						$('#global-modal').modal('show');
					});
     			});
     	}
     	
		var markup = $('<div />', {'class':'row'})
		.append(
			$('<div />', {'class':'col-md-2'}).append(
				$('<img />', {'src':item.img, 'width': 50, 'height': 50})
			)
		)
		.append(
			$('<div />', {'class':'col-md-10'}).append(
				$('<a />', {'href':item.url, html: item.label})
			)
			.append(
				$('<br/>')
			)
			.append(
				$('<span/>', {'class': 'dark', text:item.typelabel })
			)
			.append(
				$(widgetLink)
			)	
		 );
         return $("<li></li>")
             .data("item.autocomplete", item)
             .append(markup)
             .appendTo(ul);
     };
     // create a few filter links in autocomplete widget
    tabbedAutocomplete._renderMenu = function( ul, items, type ) {
		var that = this;
		var markup = $('<div>').attr('class', 'nav nav-pills ac-nav');
		var filterLinks = ["all", "artist", "album", "label"];
		var cat = this.options.sourceCategory;
		filterLinks.forEach(function(filter){
			$('<button>').attr('type', 'button')
			.attr('class', 'btn btn-primary' + ((cat === filter)?'active':''))
			.attr('data-filter', filter)
			.text(filter).bind('click', function(){
				changeAutocompleteUrl(filter);
			}).appendTo(markup);
		});
		$(markup).wrapAll($('<li>').attr('class', 'ui-state-disabled')).appendTo(ul);
		
		$.each( items, function( index, item ) {
			that._renderItemData( ul, item );
		});
	};
	
	// arrow left right for switching between tabs
	$('#mainsearch').keydown( function( event ) {
		
		// check if widget is visile
		var isOpen = $( this ).autocomplete( "widget" ).is( ":visible" );
		
		// TODO: limit functionality on focused item
		//focused = $('#mainsearch').data("ui-autocomplete").menu.element.find("li.ui-state-focus").length;
		
		if ( isOpen /*&& focused == 1*/ && event.keyCode == $.ui.keyCode.LEFT) {
			var prev = $('.ac-nav button.btn-primaryactive').prev();
			if(prev.length) {
				changeAutocompleteUrl(prev.attr('data-filter'));
				return false;
			}
		}
		
		if ( isOpen /*&& focused == 1*/ && event.keyCode == $.ui.keyCode.RIGHT) {
			var next = $('.ac-nav button.btn-primaryactive').next();
			if(next.length) {
				changeAutocompleteUrl(next.attr('data-filter'));
				return false;
			}
		}
	});
});


function changeAutocompleteUrl(type) {
	// set input value to initial searchterm
	$('#mainsearch').val($('#mainsearch').data("ui-autocomplete").term);
	
	// change ajax-url
	$('#mainsearch').autocomplete('option', 'source', function( request, response ) {
		$.ajax({
			url: "/autocomplete/"+ type+"/" + $('#mainsearch').val(),
      		dataType: "json",
      		type: 'get',
      		success: function( data ) {
				response( data );
			}
		});
	});
	
	// store active filter in variable
	$('#mainsearch').autocomplete('option', 'sourceCategory', type);
	
	// trigger refresh with new ajax-url
	$('#mainsearch').autocomplete().data("ui-autocomplete")._search();
}


function stripTags( str ) {
    str=str.toString();
    return str.replace(/<\/?[^>]+>/gi, '');
}


