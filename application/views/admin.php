
<div style="float:right; font-size:16px;"><a href="/login/logout">Logout</a></div>


<div style="clear:both;"></div>

<h3>
    Adauga un produs
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <a href="/admin_news">Adauga o noutate</a>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <a href="/admin_despre">Despre noi</a>
</h3>


<?php if (isset($error)) { ?>
	<div style="color:red;">
		<?= implode('<br>', $error) ?>
        <br><br>
	</div>
<?php } ?>

<?php if (isset($success)) { ?>
	<div style="color:green;">
		Produsul a fost adaugat cu succes
        <br><br>
	</div>
<?php } ?>


<form method="post" action="/admin/produs" enctype="multipart/form-data">
	<table border="0">
    	<tr>
        	<td>Categorie</td>
            <td width="100"></td>
            <td>
                <select  name="category" style="font-size:14px; color:#000; margin:10px 0px;">
                    <option value="0" disabled="disabled" selected="selected">Selecteaza o categorie</option>

					<?php 
                        $level = 0; 
                        $changed = 0;
                        $direction = '';
                    ?>

                    
                    <?php foreach ($categories as $key => $category) { ?>
						<?php 
                            if ($level != $category['level']) {
                                if ($level < $category['level']) {
                                    $direction = 'up';
                                } else {
                                    $direction = 'down';
                                }
                                $changed = 1;
                            } else {
                                $changed = 0;
                            }
                        ?>
						<?php if ($category['level'] == 1) { ?>
                        
							<?php if ($changed == 1 && $direction == 'down') { ?>
								</optgroup>
                            <?php } ?>

                        	<?php if ($category['clickable'] == false) { ?>
	                          <optgroup label="<?= $category['title_ro'] ?>">
							<?php } else { ?>
                                <option value="<?= $key ?>" <?php if ($key == $result['category']) { ?> selected="selected" <?php } ?>><?= $category['title_ro'] ?></option>                          
                            <?php } ?>
                        <?php } elseif ($category['level'] == 2) { ?>
                        	<option value="<?= $key ?>" <?php if ($key == $result['category']) { ?> selected="selected" <?php } ?> <?php if ($category['clickable'] == false) { ?> disabled="disabled"<?php } ?>><?= $category['title_ro'] ?></option>                          
                        <?php } elseif ($category['level'] == 3) { ?>
	                        <option value="<?= $key ?>" <?php if ($key == $result['category']) { ?> selected="selected" <?php } ?>>&nbsp; &nbsp; &nbsp; &nbsp;<?= $category['title_ro'] ?></option>                          
						<?php } ?>
						<?php 
                            $level = $category['level']; 
                        ?>
                        
                    <?php } ?>   
                </select>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td>Cod</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="code" value="<?= $result['code']?>" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td>Nume RO</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="title_ro"  value="<?= $result['title_ro']?>"/>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td>Nume EN</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="title_en" value="<?= $result['title_en']?>" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td align="right">Descriere RO</td>
            <td width="100"></td>
            <td>
				<textarea name="description_ro" class="admin"><?= $result['description_ro']?></textarea>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td align="right">Descriere EN</td>
            <td width="100"></td>
            <td>
				<textarea name="description_en" class="admin"><?= $result['description_en']?></textarea>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>

    	<tr>
        	<td align="right">Poza</td>
            <td width="100"></td>
            <td>
	            <input type="file" name="poza" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
        <tr>
            <td >Schita tehnica(pdf)</td>
            <td width="100"></td>
            <td>
                <input type="file" name="pdf" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td align="right"></td>
            <td width="100"></td>
            <td>
				<input type="submit" value="Adauga produs">
            </td>
        </tr>
    
    </table>


</form>
