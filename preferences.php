<?php session_start() ?>

<div data-role="page" id="preferences">
    <?php include "menu.php" ?>
    <div data-role="main" class="ui-content">
        <form onSubmit="return saveFields()">
            <div class="ui-field-contain">
                <div data-role="fieldcontain">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="preferencesName" />
                </div>
                <div data-role="fieldcontain">
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="preferencesEmail" />
                </div>
                <div data-role="fieldcontain">
                    <label for="zip">Zip Code:</label>
                    <input type="text" name="zip" id="preferencesZip" maxlength="5" />
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup" id="favFoods">
                        <legend>Choose your favorite foods:</legend>
                        <label for="american">American</label>
                        <input type="checkbox" name="favFoods" id="american" value="american">
                        <label for="mexican">Mexican</label>
                        <input type="checkbox" name="favFoods" id="mexican" value="mexican">
                        <label for="chinese">Chinese</label>
                        <input type="checkbox" name="favFoods" id="chinese" value="chinese">
                    </fieldset>
                </div>
                <input type="submit" value="Save" data-theme="d" />
            </div>
        </form>
    </div>
	<script>
		function saveFields() {
			localStorage.removeItem("name");
			localStorage.removeItem("email");
			localStorage.removeItem("zipCode");
			localStorage.removeItem("favFoods");
			localStorage.setItem("name", $("#preferencesName").val());
			localStorage.setItem("email", $("#preferencesEmail").val());
			localStorage.setItem("zipCode", $("#preferencesZip").val());
			localStorage.setItem("favFoods", $("#favFoods :checked").serialize());
			
			console.log(localStorage.name);
			console.log(localStorage.email);
			console.log(localStorage.zipCode);
			console.log(localStorage.favFoods);
			
            
            $.mobile.pageContainer.pagecontainer("change", "#main");
            
			return false;
		}
	</script>
</div>