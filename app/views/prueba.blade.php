<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
{{HTML::script('assets/libs/chosen/chosen.jquery.js')}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">
</head>
<body>

<script type="text/javascript">
$(function() {
    $(".chzn-select").chosen();
});
</script>

<select class="chzn-select" multiple="true" name="faculty" style="width:200px;">
        <option value="AC">A</option>
        <option value="AD">B</option>
        <option value="AM">C</option>
        <option value="AP">D</option>
</select>


</body>
</html>