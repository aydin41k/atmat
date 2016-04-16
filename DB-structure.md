DB structure for someone involved during later stages:

####header_vars
-element, value -- VARCHAR(50)

####about_atmat_vars
-element, value -- VARCHAR(50)

####member_activities_vars
-element, value -- VARCHAR(50)

####footer_vars
-element, value -- VARCHAR(50)

####news
-id -- INT(6) \n
-news_title news_author, news_pic -- VARCHAR(30 to 50) 
-news_date -- DATE
-news_body -- VARCHAR(max)
-cat -- INT(3)

####cats
-id -- INT(6) 
-cat_name -- VARCHAR(20 or 30)

####users
-id -- INT(6)
-nickname, name -- VARCHAR(30 to 50) 
-rank --- INT(3)
-password -- VARCHAR(32)
-salt -- INT(5)

####user_ranks
-id -- INT(6)
-rank -- INT(3)
-title -- VARCHAR(20)
