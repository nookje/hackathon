<div style="float:left; width:625px; overflow:hidden; ">
<?php if (isset($error)) { ?>
	<div style="color:red;">
		<?= implode('<br>', $error) ?>
	</div>
<?php } ?>

    <form method="post" action="/admin_news/editeaza_noutate/<?= $result['id'] ?>" enctype="multipart/form-data">
        <table border="0">
            
            <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td>Previzualizeaza</td>
                <td width="100"></td>
                <td>
                    <a href="/noutati/vezi/<?= $result['id'] ?>">Click sa mergi la noutate</a>
                </td>
            </tr>
            <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td>Nume RO</td>
                <td width="100"></td>
                <td>
                    <input class="admin" type="text" name="title_ro" value="<?= $result['title_ro']?>" />
                </td>
            </tr>            <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td>Nume EN</td>
                <td width="100"></td>
                <td>
                    <input class="admin" type="text" name="title_en" value="<?= $result['title_en']?>" />
                </td>
            </tr>
            <tr><td colspan="3" height="20"></td></tr>
        
            <tr>
                <td >Descriere RO</td>
                <td width="100"></td>
                <td>
                    <textarea name="description_ro" class="admin"><?= $result['description_ro']?></textarea>
                </td>
            </tr>
        
            <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td >Descriere EN</td>
                <td width="100"></td>
                <td>
                    <textarea name="description_en" class="admin"><?= $result['description_en']?></textarea>
                </td>
            </tr>
            <tr><td colspan="3" height="20"></td></tr>

            <tr>
                <td>Pozitie</td>
                <td width="100"></td>
                <td>
                    <input class="admin" type="text" name="position" value="<?= $result['position']?>"/>
                </td>
            </tr>
            <tr><td colspan="3" height="20"></td></tr>
    
			<tr>
		    	<td>Perioada</td>
		        <td width="100"></td>
		        <td>
		        	<input class="admin" type="text" name="period" value="<?= $result['period']?>"/>
		        </td>
		    </tr>
		    <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td >Poster</td>
                <td width="100"></td>
                <td>
                    <input type="file" name="poster" />
                </td>
            </tr>
		        
            <tr><td colspan="3" height="20"></td></tr>
            <tr>
                <td >Poza</td>
                <td width="100"></td>
                <td>
                    <input type="file" name="poza" />
                </td>
            </tr>
            <tr><td colspan="3" height="20"></td></tr>
        
            <tr>
                <td ></td>
                <td width="100"></td>
                <td>
                    <input type="submit" value="Salveaza">
                </td>
            </tr>
        
        </table>
    </form>
</div>

<div style="float:right; width:300px; overflow:hidden;">

    <?php if (isset($result['poster'])) { ?>
        <img class="prod-img" src="/static/images/noutati/<?= $result['id'] . '/poster/' . $result['poster']?>" alt="<?= $result['poster'] ?>" style="width:260px;">
        <a href="/admin_news/sterge_poster_noutate/<?= $result['id'] ?>/<?= $result['poster'] ?>" target="_blank">Sterge poster</a>
        <br />
        <hr />
    <?php } ?>

	<?php if (isset($result['gallery'])) { ?>
		<?php foreach ($result['gallery'] as $val) { ?>	
            <img src="/static/images/noutati/<?= $result['id'] . '/thumbnails/' . $val?>" alt="<?= $val ?>">	            
        	<a href="/admin_news/sterge_poza_noutate/<?= $result['id'] ?>/<?= $val ?>" target="_blank">Sterge poza</a>
	    <?php } ?>
    <?php } ?>
</div>

<div style="clear:both;"></div>
