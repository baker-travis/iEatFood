<?php session_start() ?>

<div data-role="page" id="preferences">
    <?php include "menu.php" ?>
    <div data-role="main" class="ui-content">
        <form>
            <div class="ui-field-contain">
                <div data-role="fieldcontain">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="preferencesName" />
                </div>
                <div data-role="fieldcontain">
                    <label for="displayName">Display Name:</label>
                    <input type="text" name="displayName" id="preferencesDisplayName" />
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
                    <label for="zipDistance">Distance From Zip Code (miles):</label>
                    <input type="text" name="zipDistance" id="preferencesZipDistance" maxlength="5" />
                </div>
                <div data-role="fieldcontain">
                    <fieldset data-role="controlgroup">
                        <legend>Choose your favorite foods:</legend>
                        <label for="american">American</label>
                        <input type="checkbox" name="favFoods" id="american" value="american">
                        <label for="mexican">Hispanic</label>
                        <input type="checkbox" name="favFoods" id="mexican" value="mexican">
                        <label for="chinese">Asian</label>
                        <input type="checkbox" name="favFoods" id="chinese" value="chinese">
                        <label for="italian">Italian</label>
                        <input type="checkbox" name="favFoods" id="italian" value="italian">
                        <label for="seafood">Seafood</label>
                        <input type="checkbox" name="favFoods" id="seafood" value="seafood">
                    </fieldset>
                </div>
                <input type="submit" value="Save" data-theme="d" />
            </div>
        </form>
    </div>
</div>