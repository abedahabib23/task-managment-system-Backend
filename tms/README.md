# Task Managment Systsm (AMTS)
### “ATMS” is a browser-based system that allows individuals and small teams to create, assign, track, and complete tasks. Users can register an account, create projects, add tasks to each project, and monitor progress via a simple dashboard. 
# Why Laravel?
### Clean and organized code (MVC)
### Easy database work (With Eloquent ORM)
### Built-in security
### Laravel is very popular
# tools
### JWT for authentication
### REST API 
### MYSQL 
# Routes
 ### POST            api/auth/login ................................................................................... Api\AuthController@login  
### POST            api/auth/logout ................................................................................. Api\AuthController@logout  
###   GET|HEAD        api/auth/me ....................................................................................... Api\AuthController@show  
###  POST            api/auth/register ............................................................................. Api\AuthController@register  
###  GET|HEAD        api/projects ................................................................. projects.index › Api\ProjectController@index  
###  POST            api/projects ................................................................. projects.store › Api\ProjectController@store  
###  GET|HEAD        api/projects/{project} ......................................................... projects.show › Api\ProjectController@show  
###  PUT|PATCH       api/projects/{project} ..................................................... projects.update › Api\ProjectController@update
###   DELETE          api/projects/{project} ................................................... projects.destroy › Api\ProjectController@destroy  
###   GET|HEAD        api/projects/{project}/tasks .............................................. projects.tasks.index › Api\TaskController@index  
###   POST            api/projects/{project}/tasks .............................................. projects.tasks.store › Api\TaskController@store  
###   GET|HEAD        api/projects/{project}/tasks/{task} ......................................... projects.tasks.show › Api\TaskController@show  
###  PUT|PATCH       api/projects/{project}/tasks/{task} ..................................... projects.tasks.update › Api\TaskController@update  
###  DELETE          api/projects/{project}/tasks/{task} ................................... projects.tasks.destroy › Api\TaskController@destroy  
###   GET|HEAD        api/projects/{project}/users ..................................... projects.users.index › Api\ProjectMemberController@index  
###   POST            api/projects/{project}/users ..................................... projects.users.store › Api\ProjectMemberController@store  
###   GET|HEAD        api/projects/{project}/users/{user} ................................ projects.users.show › Api\ProjectMemberController@show  
###   PUT|PATCH       api/projects/{project}/users/{user} ............................ projects.users.update › Api\ProjectMemberController@update  
###   DELETE          api/projects/{project}/users/{user} .......................... projects.users.destroy › Api\ProjectMemberController@destroy
###   GET|HEAD        api/tasks/{task}/comments .............................................. tasks.comments.index › Api\CommentController@index  
###   POST            api/tasks/{task}/comments .............................................. tasks.comments.store › Api\CommentController@store  
###   GET|HEAD        api/tasks/{task}/comments/{comment} ...................................... tasks.comments.show › Api\CommentController@show  
###  PUT|PATCH       api/tasks/{task}/comments/{comment} .................................. tasks.comments.update › Api\CommentController@update  
###  DELETE          api/tasks/{task}/comments/{comment} ................................ tasks.comments.destroy › Api\CommentController@destroy  
###  DELETE          api/tasks/{task}/comments/{comment} ................................ tasks.comments.destroy › Api\CommentController@destroy  
###  GET|HEAD        api/tasks/{task}/reminders ........................................... tasks.reminders.index › Api\ReminderController@index  
### POST            api/tasks/{task}/reminders ........................................... tasks.reminders.store › Api\ReminderController@store  
###  GET|HEAD        api/tasks/{task}/reminders/{reminder} .................................. tasks.reminders.show › Api\ReminderController@show  
###  PUT|PATCH       api/tasks/{task}/reminders/{reminder} .............................. tasks.reminders.update › Api\ReminderController@update  
###  DELETE          api/tasks/{task}/reminders/{reminder} ............................ tasks.reminders.destroy › Api\ReminderController@destroy

