DB structure for someone involved during later stages:

####header_vars, about_atmat_vars, member_activities_vars, footer_vars
- element -- VARCHAR(20) 
- value -- VARCHAR(1000)

####news
- id -- INT(6)
- news_title news_author, news_pic -- VARCHAR(100) 
- news_date -- DATE
- news_text -- VARCHAR(8000)
- cat -- VARCHAR(50)

####cats
- id -- INT(4) 
- cat_name -- VARCHAR(50)

####users
- id -- INT(6)
- nickname -- VARCHAR(12)
- name -- VARCHAR(50) 
- rank --- INT(2)
- password -- VARCHAR(32)
- salt -- INT(5)

####user_ranks
- id -- INT(6)
- rank -- INT(3)
- title -- VARCHAR(20)
