<?php $id = $this->getUniqueId();?>
<?php $style = $this->style != NULL ? 'style="' . $this->style . '">' : '';?>
<div id="<?php echo $id;?>_box" <?php echo $style;?>
     <input type="hidden" rel="<?php echo $id;?>" class="countdown"
       value="<?php echo $this->seconds;?>"><span id="<?php echo $id;?>"></span>
</div>
