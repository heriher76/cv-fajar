$(function () { 

    nameCallendar = ['January', 'February', 'Maret', 'April', 'May', 'Juni', 'July', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    nameDay = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']
    // day = new Date('08/11/2015');
    

    var monthNow ;
    var monthName;
    var yearNow;
    var dayOfDate;
    var date;
    getJam();
    function getJam() 
    {
        
        date = new Date();
        monthNow = date.getMonth();
        monthName = nameCallendar[monthNow];
        yearNow = date.getFullYear();
        dayOfDate = date.getDate();
        var  now = '<b>'+nameDay[date.getDay()]+'</b>, '+dayOfDate+' '+monthName+' '+yearNow;
        
        if (date.getHours()<10)
        {
            var Hour2Digit = '0'+date.getHours();
        }else{
            var Hour2Digit = date.getHours();
        }

        if (date.getMinutes()<10)
        {
            var Minutes2Digit = '0'+date.getMinutes();
        }else 
        {
            var Minutes2Digit = date.getMinutes();
        }

        var time = Hour2Digit + ":" + Minutes2Digit;
        
        console.log(dayOfDate+' '+monthName+' '+yearNow);
        $('h1#jam').html(time);
        $('h1#tanggal').html(now);
        
    }
    setInterval(function()
    { 
        getJam();
    }, 30000);
    

    console.log('run');

    $('div.col-icon').on('click','a.a-icon', function(){
        var Score = $(this).attr('id');
        var idid = $('input#idid').val();
        dataSubmitted = {
            'survey_point_id' : idid,
            'score' : Score,
        }
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/api/givescore/new/bydate/',
            type:"POST",
            data: dataSubmitted,
            error: function (error) { console.log(error)},
            success: function(){
                swal({
                    timer: 2000,
                    customClass: 'swal-wide',
                    icon: "/images/05_sunglasses.svg",
                    html: '<img src="/images/03_wink.svg" width=50% />'
                        + '<h1 class = "question text-center">Terima Kasih Untuk Ratingnya ya kak</h1>'
                });
            }
        });
    });

    

});