# Rover project
## Test subject
A squad of robotic rovers are to be landed by NASA on a plateau on Mars.
This plateau, which is curiously rectangular, must be navigated by the rovers so that their on board cameras can get a complete view of the
surrounding terrain to send back to Earth.
A rover's position is represented by a combination of an x and y co-ordinates and a letter representing one of the four cardinal compass points.
The plateau is divided up into a grid to simplify navigation. An example position might be 0, 0, N, which means the rover is in the bottom left
corner and facing North.

In order to control a rover, NASA sends a simple string of letters. The possible letters are 'L', 'R' and 'M'. 'L' and 'R' makes the rover spin 90
degrees left or right respectively, without moving from its current spot.
'M' means move forward one grid point, and maintain the same heading.
Assume that the square directly North from (x, y) is (x, y+1).

Input (hard coded, input from keyboard, input from rest api):

The first line of input is the upper-right coordinates of the plateau, the lower-left coordinates are assumed to be 0,0.
The rest of the input is information pertaining to the rovers that have been deployed. Each rover has two lines of input. The first line gives the
rover's position, and the second line is a series of instructions telling the rover how to explore the plateau.
The position is made up of two integers and a letter separated by spaces, corresponding to the x and y co-ordinates and the rover's orientation.
Each rover will be finished sequentially, which means that the second rover won't start to move until the first one has finished moving.
Output:
The output for each rover should be its final co-ordinates and heading.
Plateau max X and Y, Starting coordinates, direction and path for two rovers:
* 5 5
* 1 2 N
* LMLMLMLMM
* 3 3 E
* MMRMMRMRRM

Output and new coordinates:
* 1 3 N
 *5 1 E
 
Code should run with Docker. Code can be in PHP, NodeJS or Golang.
IMPORTANT:
There is no time limit to deliver the result, and time will be taken into account
Tests are more than welcome
Please include a README.md file with clear instructions so we can build/run the app

## Installation

### Requirements
* PHP > 5.6 (Better use 7.2 because 5.6 will only be supporte until December 2018)
* Docker
* composer

## Run
* Deploy docker-compose.yml
* Run the project using php-cli.
* Parameters have to be added respecting the following rule 
```
$php index.php [Max x] [Max y] [Rover coordonate x] [Rover coordonate y] [Rover cardinal point initial] [Rover list of actions without space]
```
Exemple for one, two and four Rovers :
```
$php index.php 5 5 1 2 N LMLMLMLMM
$php index.php 5 5 1 2 N LMLMLMLMM 3 3 E MMRMMRMRRM
$php index.php 5 5 1 2 N LMLMLMLMM 3 3 E MMRMMRMRRM 5 5 N LMRM  5 5 N LLMMMMMRMMMMM
```