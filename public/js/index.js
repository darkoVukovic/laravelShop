$(() => {
    let followBtn = $('#followItemBtn');
    let itemId = $('.items').attr('itemId');

    
    followBtn.on('click', () => {
        $.ajax({
            url: "http://shop.test/user/followitem",
            method: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                'item_id':itemId
            },
            success: function(response) {
                alert('item: '+ itemId + ' dodat u pratece')
            },
            error: function(xhr, status, error) {
                alert('greska tokom dodavanja')

            }
        });
      


    })
})