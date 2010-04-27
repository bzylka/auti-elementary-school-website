/**
 * 處室
 */
CREATE TABLE IF NOT EXISTS office (
    officeId INTEGER PRIMARY KEY NOT NULL ,
    officeName CHAR(20) NOT NULL ,
    officeEnglishName CHAR(50) ,
    officeLink CHAR(255) ,
    displayOrder INTEGER DEFAULT 0
);

/**
 * 職稱
 */
CREATE TABLE IF NOT EXISTS title (
    titleId INTEGER PRIMARY KEY NOT NULL ,
    officeId INTEGER NOT NULL DEFAULT 0 ,
    titleName CHAR(20) NOT NULL ,
    titleEnglishName CHAR(50) NOT NULL ,
    duty CHAR(255) ,
    displayOrder INTEGER DEFAULT 0
);

/**
 * 使用者
 */
CREATE TABLE IF NOT EXISTS user (
    userId INTEGER PRIMARY KEY NOT NULL ,
    titleId INTEGER NOT NULL DEFAULT 0 ,
    privilegeId INTEGER NOT NULL DEFAULT 0 ,
    userName CHAR(20) NOT NULL ,
    userEnglishName CHAR(20) ,
    account CHAR(8) NOT NULL ,
    password CHAR(40) NOT NULL ,
    salt CHAR(40) NOT NULL ,
    email CHAR(50) ,
    education CHAR(255) ,
    experience CHAR(255) ,
    talk CHAR(255) ,
    isLeader INTEGER DEFAULT 0
);

/**
 * 權限
 */
CREATE TABLE IF NOT EXISTS privilege (
    privilegeId INTEGER PRIMARY KEY NOT NULL ,
    privilegeName CHAR(20) NOT NULL
);

/**
 * 可存取的資源
 */
CREATE TABLE IF NOT EXISTS resource (
    resourceId INTEGER PRIMARY KEY NOT NULL ,
    resourceName CHAR(30) NOT NULL
);

/**
 * 存取資源的權限
 */
CREATE TABLE IF NOT EXISTS privilegeAccessResource (
    accessId INTEGER PRIMARY KEY NOT NULL ,
    privilegeId INTEGER NOT NULL DEFAULT 0,
    resourceId INTEGER NOT NULL DEFAULT 0
);

/**
 * 最新消息
 */
CREATE TABLE IF NOT EXISTS news (
    newsId INTEGER PRIMARY KEY NOT NULL ,
    officeId INTEGER NOT NULL DEFAULT 0,
    titleId INTEGER NOT NULL DEFAULT 0,
    userId INTEGER NOT NULL DEFAULT 0,
    newsTitle CHAR(100) NOT NULL ,
    newsContent CHAR(255) ,
    postDate CHAR(10) NOT NULL ,
    postTime CHAR(8) NOT NULL ,
    isImportant INTEGER DEFAULT 0
);

/**
 * 最新消息附件
 */
CREATE TABLE IF NOT EXISTS newsAttachment (
    attachmentId INTEGER PRIMARY KEY NOT NULL ,
    newsId INTEGER NOT NULL DEFAULT 0,
    fileName CHAR(255) NOT NULL ,
    fileHash CHAR(40) NOT NULL
);

/**
 * 最新消息連結
 */
CREATE TABLE IF NOT EXISTS newsLink (
    linkId INTEGER PRIMARY KEY NOT NULL ,
    newsId INTEGER NOT NULL DEFAULT 0,
    linkName CHAR(40) NOT NULL ,
    link CHAR(40) NOT NULL
);

/**
 * 相簿年份
 */
CREATE TABLE IF NOT EXISTS albumYear (
    albumYearId INTEGER PRIMARY KEY NOT NULL ,
    albumYearName CHAR(40) NOT NULL
);

/**
 * 相簿
 */
CREATE TABLE IF NOT EXISTS album (
    albumId INTEGER PRIMARY KEY NOT NULL ,
    albumYearId INTEGER NOT NULL ,
    coverPhotoId INTEGER DEFAULT 0 ,
    albumName CHAR(100) NOT NULL ,
    createDate CHAR(10) NOT NULL ,
    isSlideShow INTEGER DEFAULT 0
);

/**
 * 相片
 */
CREATE TABLE IF NOT EXISTS photo (
    photoId INTEGER PRIMARY KEY NOT NULL ,
    albumId INTEGER NOT NULL DEFAULT 0,
    userId INTEGER NOT NULL DEFAULT 0,
    fileName CHAR(255) NOT NULL ,
    photoDescription CHAR(255) NULL ,
    photoHashFile CHAR(50) NOT NULL ,
    uploadDate CHAR(10) NOT NULL ,
    uploadTime CHAR(8) NOT NULL
);

/**
 * 網路連結
 */
CREATE TABLE IF NOT EXISTS webLink (
    webLinkId INTEGER PRIMARY KEY NOT NULL ,
    userId INTEGER NOT NULL DEFAULT 0 ,
    iconHashFile CHAR(50) NOT NULL ,
    linkName CHAR(50) NOT NULL ,
    link CHAR(255) NOT NULL
);

/**
 * 成果區塊
 */
CREATE TABLE IF NOT EXISTS achievement (
    achievementId INTEGER PRIMARY KEY NOT NULL ,
    achievementName CHAR(255) NOT NULL ,
    dirHash CHAR(40) NOT NULL ,
    displayOrder INT NOT NULL DEFAULT 0
);
/**
 * 行事曆項目
 */
CREATE TABLE IF NOT EXISTS event (
    eventId INTEGER PRIMARY KEY NOT NULL ,
    eventCatalogId NOT NULL DEFAULT 0 ,
    eventName CHAR(255) NOT NULL ,
    startDate CHAR(10) NOT NULL ,
    endDate CHAR(10) NOT NULL ,
    eventDescription CHAR(255) NOT NULL
);

/**
 * 行事曆分類
 */
CREATE TABLE IF NOT EXISTS eventCatalog (
    eventCatalogId INTEGER PRIMARY KEY NOT NULL ,
    eventCatalogName CHAR(255) NOT NULL ,
    backgroundColor CHAR(7) DEFAULT 0
);


