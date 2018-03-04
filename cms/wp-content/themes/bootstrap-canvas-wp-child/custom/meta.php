<div class="my_meta_control">
   
    <p>Please insert the YouTube Video details</p>
    
    <form class="form-group">
    	<fieldset>
            <label for="format1">Video ID</label><br>
            <input type="text" name="_my_meta[format1]" value="<?php if(!empty($meta['format1'])) echo $meta['format1']; ?>"/>
       	</fieldset><br>
        
        <fieldset>
            <label for="format2">Video Title</label><br>
            <input type="text" name="_my_meta[format2]" value="<?php if(!empty($meta['format2'])) echo $meta['format2']; ?>"/>
       	</fieldset><br>
        <fieldset>
            <label for="format3">Video Duration</label><br>
            <input type="text" name="_my_meta[format3]" value="<?php if(!empty($meta['format3'])) echo $meta['format3']; ?>"/>
       	</fieldset><br>
        <fieldset>
            <label for="main_show">Main episode set for show</label><br>
            <input type="text" name="_my_meta[main_show]" value="<?php if(!empty($meta['main_show'])) echo $meta['main_show']; ?>"/>
       	</fieldset><br>
        
    <hr>
    </form>

</div>