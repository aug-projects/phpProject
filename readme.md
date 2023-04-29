# Web Technologies Project (CV Website) Semester I 2021/2022

## Idea

Anyone needs to introduce themselves to have a good chance in a company, so you should write and order everything about your experience and knowledge.

## Works

This website contains two sides of programming, which are called Front-end (using HTML, CSS design languages) and Back-end (using PHP code language). The Front-end (html tags) and Back-end (PHP code) are written inside the PHP file.

### 1. Personal Information Page

This page should show basic information about you, like: your full name, gender, birth date, place of birth, nationality, your future job title and years of experience in the career. The birth date must be in the format shown in figure 1, and the month name should use in abbreviation mode, to show the full month name.

Your image should be viewed in this page in square size, next to your details. This basic information gets from Users table in the database and enter by you direct in the table.

![image](https://user-images.githubusercontent.com/37311945/235283592-52b5d69b-3546-49a9-8693-a0268a790a63.png)

### 2. Courses Information Page

This page will show all courses that you take. Each course should have name, total hours, start date, end date, institution, attachment and notes. Attachment column should have a link that open a new page in a new tap, that will be described later. Note column could be empty or you can write anything you want.

You shouldn't make any empty row. The empty row in figure is just example. The height for each row is 80px, even it needs less than 80px. These courses get from Courses table in the database and enter from the add courses page.

![image](https://user-images.githubusercontent.com/37311945/235283602-3bf769f9-7b24-4296-9976-a1499c4a8769.png)

### 3. Experience Information Page

This page will show all experience that you have. Each experience should have job title, place of training, experience category, start month, end month and description for your works. Each one should have viewed as a paragraph.

At first, the job title. Place of training is next to job title in small view., then "/" then the category of the experience. Experience category could be: Job, Freelancer, Volunteer, Self-Learning or Other. At second, the period of training for this experience, if you are still learning, write the month of end as "until present".

These experiences get from Experiences table in the database and enter from the add experiences page.

![image](https://user-images.githubusercontent.com/37311945/235283616-b781d681-85f8-4925-ab09-52f268c845ee.png)

should make a validation for each input as needed. Hint: to have validation you should use "type" attribute.

### 4. Add Course Page

This page to add course to the database in the Courses table after validate all input except note input could be empty. After submit automatic refresh the page.

![image](https://user-images.githubusercontent.com/37311945/235283642-80740d26-f14b-4e3d-8362-054f153e24c0.png)

### 5. Add Experience Page

This page to add experience to the database in the Experiences table after validate all input except note input could be empty. After submit automatic
refresh the page.

![image](https://user-images.githubusercontent.com/37311945/235283646-0e71c6e6-7d52-45b3-ac61-7e8d726602e0.png)

### 6. Course Certificate View Page

As we see in figure 2, each course should have a page that will view the course's attachment, which will be as shown in figure 6 the image depends on the image added with the course information in the add course page. Course information passes from the view courses page.

![image](https://user-images.githubusercontent.com/37311945/235283658-8c97ca6d-c6f0-4ad7-9dc1-688b28e232c7.png)

## Fonts

- Place of use Bold Normal
- Navbar: Comic Sans MS
- Titles: Trebuchet MS
- Sub-Titles: Arial Rounded MT
- Other Text (Default): Tahoma

## Colors

- Basic color (Default): #00BAFF
- Active Navbar Item: #FFFFFF
- Inactive Navbar Item: #000000
- Save Button: #198754
- Reset Button: #dc3545
- Table Header: #606060
- Some table rows: #E5E5E5

## Main Structure for project Folder

- University ID
  - CSS
    - MyStyle.css
  - PHP
    - AddCourse.php
    - AddExperience.php
    - Course_View.php
    - Home.php
    - ViewCourses.php
    - ViewExperience.php
  - Images
