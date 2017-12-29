<script language="JavaScript">
    function chkinput(form) {
        if (form.usernc.value == "") {
            alert("username wrong");
            form.usernc.focus();
            return (false);
        }
        if (form.userpwd.value == "") {
            alert("username wrong");
            form.userpwd.focus();
            return (false);
        }
        if (form.userpwd1.value == "") {
            alert("userpwd1 wrong");
            form.userpwd1.focus();
            return (false);
        }
        if (form.userpwd.value != form.userpwd1.value) {
            alert("userpwd wrong");
            form.userpwd.focus();
            return (false);
        }
        var i = form.email.value.indexOf("@");
        var j = form.email.value.indexOf(".");
        if ((i < 0 || (i - j) < 0 || j < 0)) {
            alert("input correct email");
            form.email.select();
            return (false);
        }
        return (true);

    }
</script>