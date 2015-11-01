<form action="<?= admin_url( 'admin-ajax.php' ) ?>" id="pet-search-form">

<input type="hidden" name="action" value="pet-search" />

מין:
<select name="sex">
<option selected value="">-- כל המינים --</option>
<option value="male">זכר</option>
<option value="female">נקבה</option>
</select>

</form>
