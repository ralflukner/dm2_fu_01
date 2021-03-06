<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>{xlt t='DM2 Follow-up'}</title>
{headerTemplate}
<link href="style_light.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container mt-3">
  <div class="row">
    <div class="col-12">
      <h2>{xlt t='DM2 Follow-up'}</h2>
      <form id="dm2_fu_01" name="dm2_fu_01" action="{$FORM_ACTION}/interface/forms/dm2_fu_01/save.php" 
					onsubmit="return top.restoreSession()">
        <input type="hidden" name="csrf_token_form" value="{$CSRF_TOKEN_FORM|attr}">
        <fieldset>
          <legend>{xlt t='DM Type 2 Date of Original Diagnosis'}</legend>
          <div class="container">
            <div class="form-group">
              <text name="date_of_original_dm2_diagnosis" class="form-control" size="40" maxlength="60" onkeyup="top.isSoapEdit = true;">{$data->get_date_of_dm2_diagnosis()|text}</textarea>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{xlt t='Subjective'}</legend>
          <div class="container">
            <div class="form-group" >
              <textarea name="subjective" class="form-control" cols="60" rows="6" onkeyup="top.isSoapEdit = true;">{$data->get_subjective()|text}</textarea>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{xlt t='Objective'}</legend>
          <div class="container">
            <div class="form-group">
              <textarea name="objective" class="form-control" cols="60" rows="6" onkeyup="top.isSoapEdit = true;">{$data->get_objective()|text}</textarea>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{xlt t='Assessment'}</legend>
          <div class="container">
            <div class="form-group">
              <textarea name="assessment" class="form-control" cols="60" rows="6" onkeyup="top.isSoapEdit = true;">{$data->get_assessment()|text}</textarea>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>{xlt t='Plan'}</legend>
          <div class="container">
            <div class="form-group">
              <textarea name="plan" class="form-control" cols="60" rows="6" onkeyup="top.isSoapEdit = true;">{$data->get_plan()|text}</textarea>
            </div>
          </div>
        </fieldset>
        <div class="form-group">
          <div class="btn-group" role="group">
            <button type="submit" class="btn btn-primary btn-save" name="Submit">{xlt t='Save'}</button>
            <button type="button" class="btn btn-secondary btn-cancel" id="btnClose">{xlt t='Cancel'}</button>
          </div>
          <input type="hidden" name="id" value="{$data->get_id()|attr}" />
          <input type="hidden" name="activity" value="{$data->get_activity()|attr}" />
          <input type="hidden" name="pid" value="{$data->get_pid()|attr}" />
          <input type="hidden" name="process" value="true" />
        </div>
      </form>
    </div>
  </div>
</div>
{literal} 
<script>
        const close = function() {
            if (top.isSoapEdit === true) {
                dlgopen('', '', 450, 125, '', '<div class="text-danger">{/literal}{xla t='Warning'}{literal}</div>', {
                    type: 'Alert',
                    html: '<p>{/literal}{xla t='Do you want to close the tabs?'}{literal}</p>',
                    buttons: [
                        {text: '{/literal}{xla t='Cancel'}{literal}', close: true, style: 'default btn-sm'},
                        {text: '{/literal}{xla t='Close'}{literal}', close: true, style: 'danger btn-sm', click: closeSoap},
                    ],
                    allowDrag: false,
                    allowResize: false,
                });
            } else {
                top.restoreSession();
                location.href = 'javascript:parent.closeTab(window.name, false)';
            }
        }

        const closeSoap = function() {
            top.isSoapEdit = false;
            top.restoreSession();
            location.href = 'javascript:parent.closeTab(window.name, false)';
        }
        $('#btnClose').click(close);
    </script>
<?php

function xlt( string: $text ) {
  echo htmlspecialchars( ( $text ?? '' ), ENT_NOQUOTES );
}
?>
{/literal}
</body>
</html>