# Organize project

Organize is simple web app that helps you get your day more organized and more simple.
With the help of our reserach we found the easiest soulution to create to do lists and notes for them so you don't have to worry what kinda daily activites you have in your day.

# Build

Organize is build upon LAMP stack whcih mean any program that is used for develpoment of this kinda apps is good for use on this project.
Design pattern is MVC without framework or any support from other packages. 

# Rules for contributing

    1. Before anything goes on master branch all test code with or without comments goes on testing branch so the working code and code that needs testing are separated. This allows all of the people to fix and test new changes or new features without any changes to code that is working or create new branch localy and put it here so when testing is occured will be merged.

    2. Before you commit to testing run test command so your syntax is correct, any code with incorrect syntax will be returned or if needed deleted. 

    3. If your code isn't commented make sure it is readable and not all over the place and tracable. 

    4. For code looks and how to format it there is guide in app section app section

# Syntax test

Runing syntax test while doing app is important so if you want to run on whole project while working
## Windows users
    
    1. Install Linux subsystem on your PC. Here is how on this linkm https://docs.microsoft.com/en-us/windows/wsl/install-win10
    2. Shift + right mouse click in project directorory and select Open linux shell here
    3. Run ./tests 

## Linux users

    1. Use command cd {path to project} or find it in your file manager and Right click and select Open terminal here
    2. Run sudo chmod +x tests 
    3. Run ./tests

# Version

Current version of the app is 0.1[ALPHA] 