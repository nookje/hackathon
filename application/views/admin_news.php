
<div style="float:right; font-size:16px;"><a href="/login/logout">Logout</a></div>


<div style="clear:both;"></div>

<h3>
    <a href="/admin">Adauga un produs</a>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    Adauga o noutate
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
		Noutatea a fost adaugata cu succes
        <br><br>
	</div>
<?php } ?>


<form method="post" action="/admin_news/noutate" enctype="multipart/form-data">
	<table border="0">

        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td>Nume RO</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="title_ro" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td>Nume EN</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="title_en" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td >Descriere RO</td>
            <td width="100"></td>
            <td>
				<textarea name="description_ro" class="admin"></textarea>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td >Descriere EN</td>
            <td width="100"></td>
            <td>
				<textarea name="description_en" class="admin"></textarea>
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>


    	<tr>
        	<td>Perioada</td>
            <td width="100"></td>
            <td>
            	<input class="admin" type="text" name="period" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>

        <tr>
            <td >Posterul</td>
            <td width="100"></td>
            <td>
                <input type="file" name="poster" />
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td >Poze</td>
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
				<input type="submit" value="Adauga noutatea">
            </td>
        </tr>
    
    </table>


</form>
