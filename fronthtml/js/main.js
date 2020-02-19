$(document).ready(function() {
    $('#btn-login').on('click', function(event) {
        event.preventDefault()

        console.log('cli')

        $.ajax({
            url: 'http://megahack.marceloratton.com/user/auth',
            type: 'POST',
            data: {
                email: $('#email').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(response) {
                // console.log(response)
                localStorage.setItem('user', response)
            },
            error: function(error) {
                console.log(error)
            }
        })
    })

    $('#btn-cadastro').on('click', function(event) {
        event.preventDefault()

        $.ajax({
            url: 'http://megahack.marceloratton.com/user',
            type: 'POST',
            data: {
                email: $('#email').val(),
                naem: $('#name').val(),
                region: $('#region').val(),
                password: $('#password').val()
            },
            dataType: 'json',
            success: function(response) {
                console.log(JSON.stringify(response))
                localStorage.setItem('user', JSON.stringify(response))
            },
            error: function(error) {
                console.log(error)
            }
        })
    })
})