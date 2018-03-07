# rsDash
Current version: Version 0.0.2


Main functioning features:
 - Settings page dashboard**
 - Profile lookup
 - Adding a new 'achievement' (soon to be renamed 'Completed task')

Under development:
 - ** Settings page dashboard
 More data will be added and customized.
 - Theme switching
 - Profile page upgrade***

Current bugs:
 - Adding a new user through the webpage does not send data to database.
 - Userlist generator is broken. (may be scrapped)
 - *** Misalignment on profile pages (being recoded from scratch)
 - Average age is not counted due to correct data not being retrieved from database.

Planned changes / features:
 - Hightened SQL injection security
 - From profile, data editing
 - More profile tabs
 - Customizing graphs
 - Python discord bot integration
   - Task
   - More specific sub skills in the database
   - Monitoring user activity
     + **Summary of planned features:**  This will be the most complex feature of rsDash yet. From rsDash, administrators may create a task, set a date on which it should be done by, the skills required, expected time needed and a short description. Based on that information rsDash will, using user data such as reliability, availability and skills, it will automatically assign a user a task and direct message them the task and information. For which the user can pass on the task given to them. Doing so will diminish their reliability within the database and make them less likely to be assigned another task. The task will then be reassigned to the next more favorable user. When the user responds 'task completed' or another keyword, their reliability will be affected accordingly depending on if the time taken was higher or lower that the time needed inputted by the administrators.
    **Note: Users will not be able to see their reliability score or any other statistics**
