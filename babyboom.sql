CREATE
DATABASE babyboom;

/*USE babyboom;*/

CREATE TABLE goodPlan
(
    idGoogPlan INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name       VARCHAR(50),
    content    TEXT,
    url        VARCHAR(200)
);

CREATE TABLE advice
(
    idAdvice INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name     VARCHAR(50),
    content  TEXT
);

CREATE TABLE roles
(
    idRole INT         NOT NULL PRIMARY KEY AUTO_INCREMENT,
    role   VARCHAR(50) NOT NULL
);

CREATE TABLE parents
(
    idParent    BIGINT      NOT NULL PRIMARY KEY AUTO_INCREMENT,
    parent1Name VARCHAR(50) NOT NULL,
    parent2Name VARCHAR(50),
    tel         VARCHAR(50) NOT NULL,
    email       VARCHAR(50) NOT NULL,
    postalCode  INT         NOT NULL,
    shareCode   VARCHAR(64),
    login       VARCHAR(50),
    password    VARCHAR(64),
    idRoles     BIGINT,
    FOREIGN KEY (idRoles) REFERENCES roles (idRoles)
);

CREATE TABLE baby
(
    idBaby   BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name     VARCHAR(50),
    sexe     BOOL,
    share    BOOL,
    idParent BIGINT,
    FOREIGN KEY (idParent) REFERENCES parents (idParent)
);

CREATE TABLE infosBaby
(
    idInfoBaby    BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    size          INT,
    weight        DECIMAL(5, 2),
    age           INT,
    weekPregnancy INT,
    share         BOOL,
    idBaby        BIGINT,
    FOREIGN KEY (idBaby) REFERENCES baby (idBaby)
);

CREATE TABLE typeImage
(
    idTypeImage BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    typeImage   VARCHAR(50)
);

CREATE TABLE images
(
    idImage     BIGINT       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    url         VARCHAR(500) NOT NULL,
    name        VARCHAR(50)  NOT NULL,
    comment     TEXT,
    share       BOOL,
    idBaby      BIGINT,
    idTypeImage BIGINT,
    FOREIGN KEY (idBaby) REFERENCES baby (idBaby),
    FOREIGN KEY (idTypeImage) REFERENCES typeImage (idTypeImage)
);

CREATE TABLE pregnancy
(
    idPregnancy       BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    dateFertilization DATE,
    dateDelivery      DATE,
    share             BOOL,
    idParent          BIGINT,
    FOREIGN KEY (idParent) REFERENCES parents (idParent)
);

CREATE TABLE checkListName
(
    idCheckListName INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameCheckList   VARCHAR(50)
);

CREATE TABLE checkListItems
(
    idCheckListItems INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameItem         VARCHAR(50)
);

CREATE TABLE checkList
(
    idCheckList      BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCheckListName  INT,
    idCheckListItems INT,
    FOREIGN KEY (idCheckListName) REFERENCES checkListName (idCheckListName),
    FOREIGN KEY (idCheckListItems) REFERENCES checkListItems (idCheckListItems)
);

CREATE TABLE answer
(
    idParent    BIGINT,
    idCheckList BIGINT,
    checked     BOOL,
    PRIMARY KEY (idParent, idCheckList),
    FOREIGN KEY (idParent) REFERENCES parents (idParent),
    FOREIGN KEY (idCheckList) REFERENCES checkList (idCheckList)
);

CREATE TABLE calendarList
(
    idCalendarList INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameCalendar   VARCHAR(50)
);

CREATE TABLE calendarItems
(
    idCalendarItem INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameItem       VARCHAR(50)
);

CREATE TABLE calendar
(
    idCalendar     BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    idCalendarItem INT,
    idCalendarList INT,
    FOREIGN KEY (idCalendarItem) REFERENCES calendarItems (idCalendarItem),
    FOREIGN KEY (idCalendarList) REFERENCES calendarList (idCalendarList)
);

CREATE TABLE rdv
(
    idParent   BIGINT,
    idCalendar BIGINT,
    dateRDV    DATE,
    PRIMARY KEY (idParent, idCalendar),
    FOREIGN KEY (idParent) REFERENCES parents (idParent),
    FOREIGN KEY (idCalendar) REFERENCES calendar (idCalendar)
);