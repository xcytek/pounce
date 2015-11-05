
var services = {
    users: {
        login: function(url, data, done) {
            $.ajax({
                url      : url,
                dataType : "json",
                method   : "POST",
                data     : data
            }).done(done);
        }
    },
    colors: {
        list: function(url, done){
            $.ajax({
                url    : url,
                method : "GET"
            }).done(done);
        }
    }
};