# 💫 About Me:
I am Sathyabama V currently pursuing B Tech Information Technology<br>I’m currently working on web development<br>I’m looking to collaborate on open source projects and also efficiently with colleagues<br>And i am also eager to learn upcoming technological stacks


## 🌐 Socials:
[![LinkedIn](https://img.shields.io/badge/LinkedIn-%230077B5.svg?logo=linkedin&logoColor=white)](https://linkedin.com/in/https://www.linkedin.com/in/sathyabama-v-722877233) 

# 💻 Tech Stack:
![C](https://img.shields.io/badge/c-%2300599C.svg?style=for-the-badge&logo=c&logoColor=white) ![Java](https://img.shields.io/badge/java-%23ED8B00.svg?style=for-the-badge&logo=openjdk&logoColor=white) ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
# 📊 GitHub Stats:
![](https://github-readme-stats.vercel.app/api?username=SathyabamaV29062002&theme=vue&hide_border=false&include_all_commits=true&count_private=true)<br/>
![](https://github-readme-streak-stats.herokuapp.com/?user=SathyabamaV29062002&theme=vue&hide_border=false)<br/>
![](https://github-readme-stats.vercel.app/api/top-langs/?username=SathyabamaV29062002&theme=vue&hide_border=false&include_all_commits=true&count_private=true&layout=compact)

## 🏆 GitHub Trophies
![](https://github-profile-trophy.vercel.app/?username=SathyabamaV29062002&theme=radical&no-frame=false&no-bg=true&margin-w=4)

### ✍️ Random Dev Quote
![](https://quotes-github-readme.vercel.app/api?type=horizontal&theme=radical)

---
[![](https://visitcount.itsvg.in/api?id=SathyabamaV29062002&icon=0&color=0)](https://visitcount.itsvg.in)

<!-- Proudly created with GPRM ( https://gprm.itsvg.in ) -->



# Movie List Application Database Schema

## Introduction

This section provides an overview of the database structure for the Console-Based Movie List Application. The application uses a file-based storage system to store movie records.

## Database Structure

The database consists the movie records include the following fields:

- `id`: Unique identifier for the movie.
- `name`: Title of the movie.
- `director`: Director of the movie.
- `release_year`: Year when the movie was released.
- `language`: Language of the movie.
- `rating`: Rating of the movie.
- `music`:Musician of the movie
- `actor`:Actors in the movie
- `gener`:Type of movie

### Sample Movie Record sql structure

CREATE TABLE `movie` (
  `ID` int(100) NOT NULL,
  `M_name` varchar(50) NOT NULL,
  `Director` varchar(50) NOT NULL,
  `Actor` varchar(100) NOT NULL,
  `M_img` varchar(100) NOT NULL,
  `Music` varchar(50) NOT NULL,
  `Rel_yr` varchar(20) NOT NULL,
  `Lang` varchar(20) NOT NULL,
  `gener` varchar(20) NOT NULL,
  `Rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

Database Operations
The application supports the following operations on the movie database:

1. Show All Movies
Display all movies in the database.

2. Add a New Movie
Add a new movie to the database.

3. Filter Movies based on Criteria
Filter movies based on user-specified criteria.

4. Search for a Movie
Search for a movie by name.

5. Update a Movie's Details
Update details of an existing movie.

6. Delete a Movie
Delete a movie from the database.

7. Filter Movies by Criteria
Filter movies based on various criteria, such as Name, Director, Release Year, Language, and Rating.

8. Get the Number of Movies in a Specified Language (Bonus Task)
Implement a feature to retrieve the number of movies in a specified language.

Conclusion
This README.md file serves as a reference for the database schema, file structure, and operations supported by the Console-Based Movie List Application.
