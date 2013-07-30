This Yii widget is just a countdown that show the time left in the format 00:00:00. It also perform countup. At the end of time perform a redirection to another page (user/login) by default.

## Requirements

Yii 1.1 or above

## Install

To install this widget, first of all clone the project in your protected/extension folder and enable it in configuration file.

        'components'=>array(
                'ecountdown' => array(
                        'class'=>'ext.ecountdown.ECountDown'
                ),
        ),

## Usage

Default usage of this widget is for countdown. You can just call it and set 'seconds' value. This will show a timer that after 3 seconds redirect the user to another page.

    $this->widget('ext.ecountdown.ECountDown', array(
        'seconds' => 3,
    ));

Also, if you want you can say that this count is up and not down.

    $this->widget('ext.ecountdown.ECountDown', array(
        'seconds' => 3,
        'up' => true
    ));

## Resources

[github.com/sensorario/ecountdown](https://github.com/sensorario/ecountdown "github repository")

## Thanks to ..

Now a user that contributed to this project:

 - @maxxer

## Change Log

### v0.1 (March 15th, 2012)

 - created extension

### v1.0 (??, 2013) (only on github)

#### Enhancement

- #2: improved documentation
- #1: count-up

#### BugFix
 
- #3: wrong folder structure
- ##: removed console.log
- #4: count up will never stop
