
<div style="float:right; font-size:16px;"><a href="/login/logout">Logout</a></div>

<div style="clear:both;"></div>

<h3>
    <a href="/admin">Adauga un produs</a>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    <a href="/admin_news">Adauga o noutate</a>
     &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
    Despre noi
</h3>


<?php if (isset($error)) { ?>
	<div style="color:red;">
		<?= implode('<br>', $error) ?>
        <br><br>
	</div>
<?php } ?>

<br>
<br>

<form method="post" action="/admin_despre" enctype="multipart/form-data">
	<table border="0">

    	<tr>
        	<td >Sectiune</td>
            <td width="20"></td>
            <td>
	            <h3>Compania</h3>
                <input type="hidden" name="section" value="company">
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td >Adauga</td>
            <td width="20"></td>
            <td>
	            <input type="file" name="poza" />
            </td>
        </tr>
    
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td ></td>
            <td width="20"></td>
            <td>
				<input type="submit" value="Adauga poza">
            </td>
        </tr>
    
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td >Poze</td>
            <td width="20"></td>
            <td width="800">
				<?php if (isset($company)) { ?>
                    <?php foreach ($company as $val) { ?>	
                    <div style="float:left; margin-right:20px;">
                        <img src="/static/images/despre/company/<?= '/thumbnails/' . $val?>" alt="<?= $val ?>">	            
                        <a href="/admin_despre/sterge_poza/company/<?= $val ?>" target="_blank">Sterge poza</a>
                    </div>
                    <?php } ?>
                <?php } ?>
            </td>
        </tr>
    
    </table>
</form>

<br>
<br>
<br>
<form method="post" action="/admin_despre" enctype="multipart/form-data">
	<table border="0">

    	<tr>
        	<td >Sectiune</td>
            <td width="20"></td>
            <td>
	            <h3>Stocuri</h3>
                <input type="hidden" name="section" value="stocks">
            </td>
        </tr>
        <tr><td colspan="3" height="20"></td></tr>
    	<tr>
        	<td >Adauga</td>
            <td width="20"></td>
            <td>
	            <input type="file" name="poza" />
            </td>
        </tr>
    
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td ></td>
            <td width="20"></td>
            <td>
				<input type="submit" value="Adauga poza">
            </td>
        </tr>
    
        <tr><td colspan="3" height="20"></td></tr>
    
    	<tr>
        	<td >Poze</td>
            <td width="20"></td>
            <td width="800">
				<?php if (isset($stocks)) { ?>
                    <?php foreach ($stocks as $val) { ?>	
                    <div style="float:left; margin-right:20px;">
                        <img src="/static/images/despre/stocks/<?= '/thumbnails/' . $val?>" alt="<?= $val ?>">	            
                        <a href="/admin_despre/sterge_poza/stocks/<?= $val ?>" target="_blank">Sterge poza</a>
                    </div>
                    <?php } ?>
                <?php } ?>
            </td>
        </tr>
    
    </table>
</form>