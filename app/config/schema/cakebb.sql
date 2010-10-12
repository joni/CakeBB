DROP TABLE IF EXISTS "forums";
CREATE TABLE "forums" (
  "id" integer NOT NULL AUTO_INCREMENT,
  "name" tinytext,
  "description" text,
  PRIMARY KEY ("id")
);

DROP TABLE IF EXISTS "posts";
CREATE TABLE "posts" (
  "id" integer NOT NULL AUTO_INCREMENT,
  "topic_id" integer NOT NULL,
  "post_text" text,
  "created" datetime,
  "modified" datetime,
  PRIMARY KEY ("id")
);

DROP TABLE IF EXISTS "topics";
CREATE TABLE "topics" (
  "id" integer NOT NULL AUTO_INCREMENT,
  "forum_id" integer DEFAULT NULL,
  "title" tinytext,
  "created" datetime,
  PRIMARY KEY ("id")
);
