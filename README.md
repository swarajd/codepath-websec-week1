# Project 1 - Globitek CMS

Time spent: **3** hours spent in total

## User Stories

The following **required** functionality is completed:

1. [x]  Required: Public page: Territories
  * [x]  Required: The page should be called "territories.php".
  * [x]  Required: It displays a bulleted list of states sorted alphabetically.
  * [x]  Required: There is a bulleted list of territories indented below each state.
  * [x]  Required: The territories are sorted based on a custom position value.
  * [x]  Required: Set territory position values such that:
    * [x]  'Northern' always comes before 'Southern'.
    * [x]  'Western' always comes before 'Eastern'.
    * [x]  Chicago, Las Vegas, and New York are before any "Outside" territories.
  * [x]  Required: When a territory name is the same as its state name, it does not display the territory name, just the state name.
  * [x]  Required: There is a list of assigned salespeople below each territory.
    * [x]  Sorted by last name then first name, unbulleted, unindented.
    * [x]  Note that New York City should have two salesperson assignments.
  * [x]  Required: Each salesperson's name is a link to a page with more details (salesperson.php).

2. [x]  Required: Public page: Salesperson
  * [x]  Required: The page should be called "salesperson.php".
  * [x]  Required: It has a link back to the territories.php page at the top.
  * [x]  Required: It displays contact information (name, phone, email) for a single salesperson.
  * [x]  Required: It displays a bulleted list of the salesperson's territories.
  * [x]  Required: It redirects to territories.php if the requested salesperson is not found.

3. [x]  Required:  Organize code to keep functions and database credentials private. Use good code formatting and code comments to make your code clear to others.

4. [x]  Required:  All dynamic content being output to HTML should be encoded using best practices.

5. [x]  Required:  Use database best practices such as freeing results from memory and closing the database connection when your code is finished using them.

The following advanced user stories are optional:

* [x]  Bonus: Move the header and footer of the HTML template into separate files and use include() to load them. Make sure the HTML title is still correct for both pages.

* [x]  Bonus: Create a new file "private/initialize.php". This file should become the only required file at the top of your PHP pages. It would then require all the other PHP files that are needed as well as create a new database connection.

* [x]  Bonus: Add a countries table with a one-to-many relationship to states. Add "United States" as the only country and assign all 50 states to it. Add it to the public pages and indent the states list below it.

* [x]  Bonus: If you added a countries table, use the MySQL console to add Canada as a country and populate the database with a few provinces and territories for Canada. Pick a salesperson or two and make assignments for all of the new territories.

* [ ]  Bonus: Convert all SQL queries into callable functions.

* [x]  Advanced: Create a separate set of "staff area" pages in directory called "staff" which display states, territories, and salespeople. Each one should have a list view showing all records and a detail view for examining a single record.

* [x]  Advanced: If you created "staff area" pages, nest the pages for viewing territories inside the pages for viewing states. A user would select a state in order to view a list of the territories belonging to that state only.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/vzak8FN.gifv' title='Video Walkthrough' width='' alt='Video Walkthrough' />
(this is a gifv^ and github doesn't support gifv so I guess just click it to view)

GIF created with gtk-screenrecorder and ImageMagick ._. (because linux lives matter too).

## Notes

The php code set up was nicer this time I like it. I could get used to php it's pretty good when written correctly. 

## License

    Copyright [2017] [Swaraj Dhumne]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.