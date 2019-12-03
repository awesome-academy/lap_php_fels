function countdown( elementName, minutes, seconds )
{
    var element, endTime, hours, mins, msLeft, time;

    function twoDigits( n )
    {
        return (n <= 9 ? "0" + n : n);
    }

    function updateTimer()
    {
        msLeft = endTime - (+new Date);
        if ( msLeft < 1000 ) {
            alert("Time is up!");
            value = [
                $(".0").data('value'),
                $(".1").data('value'),
                $(".2").data('value'),
                $(".3").data('value'),
                $(".4").data('value'),
            ];
            // for (var i = 0; i < value.length; i++) {
            //     let name = 'question['+ value[i] +']';
            //     console.log($("input[name= name]").val());
            //     // if ($("input[name=" + name + "]:checked").val()) {

            //     // }
            //     console.log(name);
            // }
            document.getElementById("submit").click();
        } else {
            time = new Date( msLeft );
            hours = time.getUTCHours();
            mins = time.getUTCMinutes();
            element.innerHTML = (hours ? hours + ':' + twoDigits( mins ) : mins) + ':' + twoDigits( time.getUTCSeconds() );
            setTimeout( updateTimer, time.getUTCMilliseconds() + 500 );
        }
    }

    element = document.getElementById( elementName );
    endTime = (+new Date) + 1000 * (60*minutes + seconds) + 500;
    updateTimer();
}

countdown( "ten-countdown", 10   , 0 );
