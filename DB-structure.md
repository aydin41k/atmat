DB structure for someone involved during later stages:

#header_vars
element, value -- both CHAR(50)

#about_atmat_vars
element, value -- both CHAR(50)

#member_activities_vars
element, value -- both CHAR(50)

#footer_vars
element, value -- both CHAR(50)

#news
id, news_title, news_author, news_date, news_body, news_pic, cat

#cats
Cols:id, cat_name

#users
id, nickname, name, rank, password, salt

#user_ranks
id, rank, title

