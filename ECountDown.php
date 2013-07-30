<?php

/**
 * This is ECountDown class file for update action
 * 
 * PHP version 5
 * 
 * @category ECountDown
 * @package  Sensorario\Widgets\ECountDown
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  GIT: 1.0
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */


/**
 * This is ECountDown class file for update action
 * 
 * @category ECountDown
 * @package  Sensorario\Widgets\ECountDown
 * @author   Simone Gentili <sensorario@gmail.com>
 * @license  http://opensource.org/licenses/MIT MIT
 * @version  Release: 1.0
 * @link     https://github.com/sensorario/sensorariocomments github repository
 * 
 */
class ECountDown extends CWidget
{

    private static $_unique;

    public $seconds = 10;

    public $follow = null;

    public $up = false;

    public $style = null;

    /**
     * This method provide unique id for each countdown.
     * 
     * @return string
     */
    public function getUniqueId()
    {

        return md5(++self::$unique);

    }

    /**
     * Init method.
     * 
     * @return null
     */
    public function init()
    {

        if ($this->follow == null) {
            $this->follow = Yii::app()->createUrl('site/login');
        }

        $script = 'function countDown() {
            $(".countdown").each(function() {
                var valore = parseInt($(this).attr(\'value\')) '
          . ($this->up ? '+' : '-')
          . ' 1;

                if(typeof(valore_iniziale) == \'undefined\') {
                    valore_iniziale = valore;
                }

                $(this).attr(\'value\',valore);

                secondi = valore' . ($this->up ? '-' . $this->seconds : '') . ';
                _secondi = secondi % 60;
                _minuti = ((secondi - _secondi) / 60) % 60;
                _ore = (secondi - _secondi - _minuti * 60) / 3600;
                
                _ore = _ore < 10 ? "0"+_ore : _ore;
                _minuti = _minuti < 10 ? "0"+_minuti : _minuti;
                _secondi = _secondi < 10 ? "0"+_secondi : _secondi;

                $("#"+$(this).attr("rel")).html(_ore+":"+_minuti+":"+_secondi);
                
		if(
            (valore-' . $this->seconds . ' >= valore_iniziale-1) || 
            (' . ($this->up ? 'valore-' . $this->seconds . '==0' : 'valore<=0') . ')
        ) {
                    document.location.href = "' . $this->follow . '";
                }
            });
            setTimeout("countDown();", 1000);
        }';

        Yii::app()->getClientScript()
          ->registerCoreScript('jquery')
          ->registerScript('countDown', $script, CClientScript::POS_END)
          ->registerScript('callcountDown', 'countDown()', CClientScript::POS_END);

    }

    /**
     * Run method.
     * 
     * @return null This method dont return anything.
     */
    public function run()
    {

        $params = array(
          'this' => $this
        );

        $this->render('prova', $params);

    }

}
