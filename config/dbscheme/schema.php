<?php
class Schema extends AbstractSchema
{
  protected function buildQueries()
  {
    return array(
      "DROP TABLE IF EXISTS `album`",
      "CREATE TABLE `album` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `title` text,\r"
      . "  `relPath` text,\r"
      . "  `relPathHash` varchar(11) NOT NULL DEFAULT '',\r"
      . "  `year` smallint(4) unsigned DEFAULT NULL,\r"
      . "  `month` tinyint(2) unsigned DEFAULT NULL,\r"
      . "  `artistUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `genreUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `labelUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `added` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `filemtime` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `discs` tinyint(3) unsigned NOT NULL DEFAULT '0',\r"
      . "  `importStatus` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `lastScan` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `albumDr` tinyint(3) unsigned DEFAULT NULL,\r"
      . "  `trackCount` smallint(5) unsigned DEFAULT '0',\r"
      . "  `isMixed` smallint(1) unsigned DEFAULT NULL,\r"
      . "  `isJumble` smallint(1) unsigned DEFAULT NULL,\r"
      . "  `isLive` smallint(1) unsigned DEFAULT NULL,\r"
      . "  `discogsId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `rolldabeatsId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `beatportId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `junoId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `catalogNr` varchar(64) NOT NULL DEFAULT '',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `artistUid` (`artistUid`),\r"
      . "  KEY `year` (`year`,`month`),\r"
      . "  KEY `labelUid` (`labelUid`),\r"
      . "  KEY `genreUid` (`genreUid`),\r"
      . "  KEY `added` (`added`),\r"
      . "  KEY `importStatus` (`importStatus`),\r"
      . "  KEY `isMixed` (`isMixed`),\r"
      . "  FULLTEXT KEY `relPath` (`relPath`),\r"
      . "  FULLTEXT KEY `title` (`title`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `albumindex`",
      "CREATE TABLE `albumindex` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `artist` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `allchunks` mediumtext NOT NULL,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `artist` (`artist`),\r"
      . "  KEY `title` (`title`),\r"
      . "  FULLTEXT KEY `allchunks` (`allchunks`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `artist`",
      "CREATE TABLE `artist` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `article` varchar(24) NOT NULL DEFAULT '',\r"
      . "  `az09` varchar(255) NOT NULL DEFAULT '0',\r"
      . "  `trackCount` int(11) unsigned DEFAULT '0',\r"
      . "  `albumCount` int(11) unsigned DEFAULT '0',\r"
      . "  `topGenreUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  `topLabelUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `az09` (`az09`),\r"
      . "  KEY `trackCount` (`trackCount`),\r"
      . "  KEY `albumCount` (`albumCount`)\r"
      . ") ENGINE=MyISAM  DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `bitmap`",
      "CREATE TABLE `bitmap` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `relPath` text,\r"
      . "  `relPathHash` varchar(11) NOT NULL DEFAULT '',\r"
      . "  `filemtime` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `filesize` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `mimeType` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `width` int(7) unsigned DEFAULT NULL,\r"
      . "  `height` int(7) unsigned DEFAULT NULL,\r"
      . "  `bghex` varchar(7) NOT NULL DEFAULT '',\r"
      . "  `albumUid` int(11) unsigned DEFAULT NULL,\r"
      . "  `trackUid` int(11) unsigned DEFAULT NULL,\r"
      . "  `rawTagDataUid` int(11) unsigned DEFAULT NULL,\r"
      . "  `embedded` tinyint(4) unsigned DEFAULT NULL,\r"
      . "  `embeddedName` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `pictureType` varchar(20) NOT NULL DEFAULT '',\r"
      . "  `sorting` int(6) unsigned DEFAULT NULL,\r"
      . "  `importStatus` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `error` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `relPathHash` (`relPathHash`),\r"
      . "  KEY `albumUid` (`albumUid`),\r"
      . "  KEY `trackUid` (`trackUid`),\r"
      . "  KEY `rawTagDataUid` (`rawTagDataUid`),\r"
      . "  KEY `importStatus` (`importStatus`),\r"
      . "  KEY `embedded` (`embedded`),\r"
      . "  KEY `pictureType` (`pictureType`),\r"
      . "  KEY `sorting` (`sorting`),\r"
      . "  KEY `error` (`error`),\r"
      . "  FULLTEXT KEY `relPath` (`relPath`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `db_alias`",
      "CREATE TABLE `db_alias` (\r"
      . "  `rev` bigint(20) unsigned NOT NULL,\r"
      . "  `alias` varchar(32) DEFAULT NULL,\r"
      . "  PRIMARY KEY (`rev`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `db_revisions`",
      "CREATE TABLE `db_revisions` (\r"
      . "  `rev` bigint(20) unsigned NOT NULL,\r"
      . "  PRIMARY KEY (`rev`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `discogsapicache`",
      "CREATE TABLE `discogsapicache` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `tstamp` int(11) unsigned NOT NULL,\r"
      . "  `type` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `extid` int(11) unsigned NOT NULL,\r"
      . "  `response` mediumtext NOT NULL,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `type` (`type`),\r"
      . "  KEY `extid` (`extid`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `editorial`",
      "CREATE TABLE `editorial` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `crdate` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `tstamp` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `itemType` varchar(20) NOT NULL DEFAULT '',\r"
      . "  `itemUid` int(11) NOT NULL DEFAULT '0',\r"
      . "  `relPath` text NOT NULL,\r"
      . "  `relPathHash` varchar(11) NOT NULL,\r"
      . "  `fingerprint` varchar(32) NOT NULL DEFAULT '',\r"
      . "  `column` varchar(32) NOT NULL DEFAULT '',\r"
      . "  `value` text,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `itemUid` (`itemUid`),\r"
      . "  KEY `relPathHash` (`relPathHash`),\r"
      . "  KEY `fingerprint` (`fingerprint`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `genre`",
      "CREATE TABLE `genre` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `parent` int(4) unsigned NOT NULL DEFAULT '0',\r"
      . "  `az09` varchar(255) NOT NULL DEFAULT '0',\r"
      . "  `trackCount` int(11) unsigned DEFAULT '0',\r"
      . "  `albumCount` int(11) unsigned DEFAULT '0',\r"
      . "  `topArtistUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  `topLabelUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `az09` (`az09`),\r"
      . "  KEY `trackCount` (`trackCount`),\r"
      . "  KEY `albumCount` (`albumCount`)\r"
      . ") ENGINE=MyISAM  DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `importer`",
      "CREATE TABLE `importer` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `batchUid` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `jobPhase` int(11) NOT NULL DEFAULT '0',\r"
      . "  `jobStart` double NOT NULL,\r"
      . "  `jobLastUpdate` double NOT NULL,\r"
      . "  `jobEnd` double NOT NULL,\r"
      . "  `jobStatistics` longtext NOT NULL,\r"
      . "  `relPath` text NOT NULL,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `jobStart` (`jobStart`),\r"
      . "  KEY `jobEnd` (`jobEnd`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `label`",
      "CREATE TABLE `label` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `az09` varchar(255) NOT NULL DEFAULT '0',\r"
      . "  `trackCount` int(11) unsigned DEFAULT '0',\r"
      . "  `albumCount` int(11) unsigned DEFAULT '0',\r"
      . "  `topArtistUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  `topGenreUids` varchar(20) NOT NULL  DEFAULT '',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `az09` (`az09`),\r"
      . "  KEY `trackCount` (`trackCount`),\r"
      . "  KEY `albumCount` (`albumCount`)\r"
      . ") ENGINE=MyISAM  DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `playnext`",
      "CREATE TABLE `playnext` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `tstamp` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `prio` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `userId` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `trackUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `relPath` text NOT NULL,\r"
      . "  `relPathHash` varchar(11) NOT NULL,\r"
      . "  `fingerprint` varchar(32) NOT NULL DEFAULT '',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `prio` (`prio`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `pollcache`",
      "CREATE TABLE `pollcache` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `microtstamp` varchar(255) NOT NULL,\r"
      . "  `type` varchar(11) NOT NULL,\r"
      . "  `deckindex` tinyint(4) unsigned DEFAULT '0',\r"
      . "  `success` tinyint(2) unsigned DEFAULT '0',\r"
      . "  `ipAddress` varchar(15) NOT NULL,\r"
      . "  `port` tinyint(5) unsigned DEFAULT '0',\r"
      . "  `response` mediumtext NOT NULL,\r"
      . "  PRIMARY KEY (`uid`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `random`",
      "CREATE TABLE `random` (\r"
      . "  `sid` varchar(40) NOT NULL DEFAULT '',\r"
      . "  `track_id` varchar(20) NOT NULL DEFAULT '',\r"
      . "  `position` smallint(5) unsigned NOT NULL DEFAULT '0',\r"
      . "  `create_time` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  KEY `sid` (`sid`),\r"
      . "  KEY `track_id` (`track_id`),\r"
      . "  KEY `position` (`position`),\r"
      . "  KEY `create_time` (`create_time`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `rawtagdata`",
      "CREATE TABLE `rawtagdata` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `artist` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `album` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `genre` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `comment` text NOT NULL,\r"
      . "  `year` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `date` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `publisher` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `trackNumber` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `totalTracks` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `albumArtist` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `remixer` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `language` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `country` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `relPath` text NOT NULL,\r"
      . "  `relPathHash` varchar(11) NOT NULL,\r"
      . "  `relDirPath` text NOT NULL,\r"
      . "  `relDirPathHash` varchar(11) NOT NULL,\r"
      . "  `directoryMtime` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `initialKey` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textBpm` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textBpmQuality` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textPeakDb` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textPerceivedDb` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textRating` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `catalogNr` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textDiscogsReleaseId` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textUrlUser` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `textSource` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `fingerprint` varchar(32) NOT NULL DEFAULT '',\r"
      . "  `mimeType` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `filesize` bigint(20) unsigned NOT NULL DEFAULT '0',\r"
      . "  `filemtime` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `miliseconds` varchar(24) NOT NULL DEFAULT '',\r"
      . "  `dynamicRange` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `audioBitrate` varchar(24) NOT NULL DEFAULT '',\r"
      . "  `audioBitrateMode` varchar(24) NOT NULL DEFAULT '',\r"
      . "  `audioBitsPerSample` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `audioSampleRate` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `audioChannels` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `audioLossless` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `audioComprRatio` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `audioDataformat` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `audioEncoder` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `audioProfile` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoDataformat` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoCodec` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoResolutionX` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `videoResolutionY` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `videoFramerate` varchar(24) NOT NULL DEFAULT '0',\r"
      . "  `lastScan` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `importStatus` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `error` text,\r"
      . "  `added` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `relPathHash` (`relPathHash`),\r"
      . "  KEY `relDirPathHash` (`relDirPathHash`),\r"
      . "  KEY `fingerprint` (`fingerprint`),\r"
      . "  KEY `filemtime` (`filemtime`),\r"
      . "  KEY `directoryMtime` (`directoryMtime`),\r"
      . "  KEY `importStatus` (`importStatus`),\r"
      . "  FULLTEXT KEY `error` (`error`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `suggest`",
      "CREATE TABLE `suggest` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `keyword` varchar(255) NOT NULL,\r"
      . "  `trigrams` varchar(255) NOT NULL,\r"
      . "  `freq` int(11) unsigned NOT NULL,\r"
      . "  PRIMARY KEY (`uid`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `track`",
      "CREATE TABLE `track` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `artistUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `featuringUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `remixerUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `relPath` text NOT NULL,\r"
      . "  `relPathHash` varchar(11) NOT NULL,\r"
      . "  `relDirPathHash` varchar(11) NOT NULL,\r"
      . "  `fingerprint` varchar(32) NOT NULL DEFAULT '',\r"
      . "  `mimeType` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `filesize` bigint(20) unsigned NOT NULL DEFAULT '0',\r"
      . "  `filemtime` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `miliseconds` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioBitrate` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioBitsPerSample` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioSampleRate` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioChannels` tinyint(3) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioLossless` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioComprRatio` double unsigned NOT NULL DEFAULT '0',\r"
      . "  `audioDataformat` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `audioEncoder` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `audioProfile` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoDataformat` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoCodec` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `videoResolutionX` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `videoResolutionY` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `videoFramerate` int(10) unsigned NOT NULL DEFAULT '0',\r"
      . "  `disc` tinyint(3) unsigned NOT NULL DEFAULT '0',\r"
      . "  `trackNumber` varchar(8) DEFAULT NULL,\r"
      . "  `error` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `albumUid` varchar(11) NOT NULL DEFAULT '',\r"
      . "  `transcoded` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `importStatus` tinyint(1) unsigned NOT NULL DEFAULT '0',\r"
      . "  `lastScan` int(11) unsigned NOT NULL DEFAULT '0',\r"
      . "  `genreUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `labelUid` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `catalogNr` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `comment` text NOT NULL,\r"
      . "  `year` smallint(4) unsigned DEFAULT NULL,\r"
      . "  `isMixed` smallint(1) unsigned DEFAULT NULL,\r"
      . "  `discogsId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `rolldabeatsId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `beatportId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `junoId` varchar(64) NOT NULL DEFAULT '',\r"
      . "  `dynRange` tinyint(3) unsigned DEFAULT NULL,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `artistUid` (`artistUid`),\r"
      . "  KEY `featuringUid` (`featuringUid`),\r"
      . "  KEY `title` (`title`),\r"
      . "  KEY `remixerUid` (`remixerUid`),\r"
      . "  KEY `relPathHash` (`relPathHash`),\r"
      . "  KEY `fingerprint` (`fingerprint`),\r"
      . "  KEY `audioDataformat` (`audioDataformat`),\r"
      . "  KEY `videoDataformat` (`videoDataformat`),\r"
      . "  KEY `albumUid` (`albumUid`,`disc`),\r"
      . "  KEY `importStatus` (`importStatus`),\r"
      . "  KEY `genreUid` (`genreUid`),\r"
      . "  KEY `labelUid` (`labelUid`),\r"
      . "  KEY `error` (`error`),\r"
      . "  KEY `transcoded` (`transcoded`),\r"
      . "  FULLTEXT KEY `relPath` (`relPath`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "DROP TABLE IF EXISTS `trackindex`",
      "CREATE TABLE `trackindex` (\r"
      . "  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT,\r"
      . "  `artist` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `title` varchar(255) NOT NULL DEFAULT '',\r"
      . "  `allchunks` mediumtext NOT NULL,\r"
      . "  PRIMARY KEY (`uid`),\r"
      . "  KEY `artist` (`artist`),\r"
      . "  KEY `title` (`title`),\r"
      . "  FULLTEXT KEY `allchunks` (`allchunks`)\r"
      . ") ENGINE=MyISAM DEFAULT CHARSET=utf8",
      "INSERT INTO `db_revisions` SET rev=1468749226",
      "INSERT INTO `db_alias` SET rev=1468749226, alias='slimpd_v1'",
    );
  }
}
