DROP TABLE IF EXISTS forums;
CREATE TABLE forums (
  id integer NOT NULL AUTO_INCREMENT,
  name tinytext,
  description text,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
  id integer NOT NULL AUTO_INCREMENT,
  topic_id integer NOT NULL,
  post_text text,
  created datetime,
  modified datetime,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS topics;
CREATE TABLE topics (
  id integer NOT NULL AUTO_INCREMENT,
  forum_id integer DEFAULT NULL,
  title tinytext,
  created datetime,
  PRIMARY KEY (id)
);

INSERT INTO forums (name, description) VALUES ('General', 'General discussion about Life, Universe, And Everything');
INSERT INTO topics (forum_id, title, created) VALUES (1, 'Hello World', '2010-10-13');
INSERT INTO posts (topic_id, post_text, created) VALUES (1,
    'What''s up with "hello world"? Nearly every programming book and tutorial seems to start with something that prints "Hello World"',
    '2010-10-13');
INSERT INTO posts (topic_id, post_text, created) VALUES (1, 
    'Ah, the "hello world" program. It first appeared in "C Programming" by Brian Kernighan and Dennis Ritchie, also known as the K&R book. The book was very successful thanks to its clear writing and complete and realistic code examples. My guess is that other writers started using "hello world" as the first program first as a tribute to K&R, and then the convention stuck. Wikipedia has more information: http://en.wikipedia.org/wiki/Hello_world_program

A modern C version of the hello world program might be written like this:

#include <stdio.h>

int main(void) {
    printf("%s\\n", "Hello World!");
}
    ', 
    '2010-10-13');
