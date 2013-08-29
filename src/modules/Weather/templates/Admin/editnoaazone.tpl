{ include file="Admin/menu.tpl" }


{nocache}
{form cssClass="z-form"}
    {formvalidationsummary}

    <fieldset class="z-linear">
        <legend>{gt text="NOAA Zone Definitionl"}</legend>
        <div class="z-formrow">
            {formlabel for="description" __text="Description" mandatorysym=1}
            {formtextinput maxLength="255" id="description" mandatory=1}
        </div>

        <div class="z-formrow">
            {formlabel for="url" __text="URL" mandatorysym=1}
            {formtextinput maxLength="255" id="url" mandatory=1}
        </div>
    </fieldset>

    <div class="z-buttons z-formbuttons">
        {formbutton class='z-bt-ok' commandName='save' __text='Save'}
        {formbutton class='z-bt-cancel' commandName='cancel' __text='Cancel'}
    </div>
{/form}
{/nocache}
