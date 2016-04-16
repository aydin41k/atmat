DB structure for someone involved during later stages:

Table: header_vars
Cols: element, value -- both CHAR(50)

Table: about_atmat_vars
Cols: element, value -- both CHAR(50)

Table: member_activities_vars
Cols: element, value -- both CHAR(50)

Table: footer_vars
Cols: element, value -- both CHAR(50)

Table: news
Cols: id, news_title, news_author, news_date, news_body, news_pic, cat

Table: cats
Cols:id, cat_name

Table: users
Cols: id, nickname, name, rank, password, salt

Table: user_ranks
Cols: id, rank, title

