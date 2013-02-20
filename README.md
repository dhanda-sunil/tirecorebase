TireCore
========


Overview
--------

TireCore uses CakePHP and Bancha

Developer Remote API is available at /developer-remote-api.html


How to setup the project
------------------------

1. Download [CakePHP](http://www.cakephp.com) latest or clone the latest version by running `git clone https://github.com/cakephp/cakephp.git [directory you want to clone into, e.g. tirecore]`
2. Delete the app folder
3. Clone the TCSTech/TireCore repository and save the git URL for the next step
3. Open the terminal inside the cake folder and type the following (replacing the bracketed text with your git cloned URL):
    
    ```
    git clone {your git URL} app && cd app && git submodule update --init --recursive 
    ``` 
If you're working on the company server (TCS Employees only), use the following line instead
    ```
    git clone -b development --recursive https://github.com/TCSTech/TireCore.git app && cd app && git submodule update --init --recursive 
    ```  

4. Set up PHP Pear and Phing (see [pear](http://pear.php.net/manual/en/installation.php) and [phing](http://www.phing.info/trac/wiki/Users/Download).
5. Set up an empty database to use for the project.
6. Copy Config/database.php.default to Config/database.php and Config/build.properties.example to db.properties and make appropriate changes for your setup: `cp Config/database.php.default Config/database.php` `cp Config/db.properties.example Config/db.properties` Note that this application can support multiple databases.
7. To set up the initial database, run phing clean from the app directory.
8. Setup a domain (e.g. tirecore.local) and point it to the [cakePHP cloned directory]/app/webroot folder.
9. To keep your database up to date, run phing in the app directory after each pull or at minimum, after new migrations have been added to Config/Schema/Migrations. You may want to add this to a git hook.
10. _If you're having problems_, often it is due to the file permissions of the app/tmp folder. Make sure that is writable by 
	apache and PHP and you should be ok.

About the project
-----------------

The project is CakePHP base with two Sencha Touch front ends. The Sencha Touch applications are in webroot/workorder 
and webroot/shopfloor. We use [JIRA](https://tcsgeeks.atlassian.net/) to track bugs and new features. _Please remember
that there is a difference between the two_.

Workflow
--------

In general, when working on an item, you should be checking out a new branch to make changes:

1. Create a new branch by typing `git checkout -b name_of_new_branch`
1. Make changes in the branch and commit them
1. Switch to the development branch by typing `git checkout development`
1. Pull latest development changes from the server: `git pull development`
1. Merge your changes into development (use no-ff option): `git merge --no-ff name_of_new_branch`
1. _Important!_ Fix any merge issues
1. Push changes to the server: `git push development`
1. Remove your local changes branch: `git -d name_of_new_branch`

Any suggested schema changes need to be emailed to jloosli@tcstire.com

You can see the latest build statii below:

* Development: [![Development Status](http://jenkins.development.treadtracks.tcsgeeks.com/job/TireCore/badge/icon)](http://jenkins.development.treadtracks.tcsgeeks.com/job/TireCore/)


How to update Bancha and BanchaDeveloperRemoteApi
-------------------------------------------------

First time, go inside your terminal inside your app fodler and type:

    cd Plugin/Bancha
    git remote add upstream git://github.com/Bancha/Bancha.git
    cd ../BanchaDeveloperRemoteApi
    git remote add upstream git://github.com/Bancha/BanchaDeveloperRemoteApi.git

To pull the latest official changes just go into the right folder and type:

    git pull upstream master
    git push

ACL Setup
=========

Create and sync ACOs
--------------------

    cake AclExtras.AclExtras aco_sync

Create AROs
--------------------

The User and UserGroup models will automatically create new AROs. The following commands are only needed if you have existing Groups and users that need to be tied to AROs. Do this for each of the group IDs you have already created (in the form Group.{id}):

    cake acl create aro root Group.1
    cake acl create aro root Group.2
    cake acl create aro root Group.3

etc.

To assign users to groups, use the following command (change the ids to the appropriate values):

    cake acl create aro Group.1 User.1
    cake acl create aro Group.1 User.2
    cake acl create aro Group.2 User.3

etc.

Link AROs and ACOs (set up permissions)
---------------------------------------

These steps are not done automatically and are needed to be followed again if permissions are changed. For a Super Admin group that gets permission for everything, run the following command:

    cake acl grant Group.1 controllers

This will grant everyone in Group.1 access to all controllers. To limit access, deny everything, then grant the individual actions:

    cake acl deny Group.2 controllers
    cake acl grant Group.2 controllers/Cos
    cake acl grant Group.2 controllers/CoItems/add
    cake acl grant Group.2 controllers/CoItems/view
    .
    .
    .





