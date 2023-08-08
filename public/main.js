function call(type, url, formName) {
    //create Request Object
    let XmlHttpRequest = new XMLHttpRequest();

    //function call back
    XmlHttpRequest.onreadystatechange = () => {
        if( XmlHttpRequest.readyState == XMLHttpRequest.DONE ) {
            const code = XmlHttpRequest.status;
            let result = XmlHttpRequest.response;

            if( code == 200 ) {
                //show message ok
                let MessageSuccess = u("#showSuccess");

                MessageSuccess.removeClass('hidden');

                setTimeout(() => { MessageSuccess.addClass('hidden') }, 3000);
            } else {
                //show message error
                let MessageError = u("#showError");

                MessageError.removeClass('hidden');

                setTimeout(() => { MessageError.addClass('hidden') }, 3000);

                //set error info in components
                const Response  = JSON.parse(result);
                const Errors    = Response.errors;

                for( const [key, value] of Object.entries(Errors) ) {
                    let ErrorBlock      = u("#error-" + key + "-block");
                    let ErrorMessage    = u("#error-" + key + "-message");

                    ErrorBlock.removeClass('hidden');
                    ErrorMessage.text(value);
                }
            }
        }
    };

    //open and header
    XmlHttpRequest.open(type, url, true);
    XmlHttpRequest.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    //get Data
    const   Form        = document.getElementById(formName);
    const   elements    = Array.from(Form.elements);
    let     dataString  = '{ ';

    elements.forEach( element => {
        if( element.name.length > 0 ) {
            dataString = dataString + '"' + element.name + '":"' + element.value + '", ';
        }
    });

    dataString = dataString.slice(0, -2);
    dataString = dataString + ' }';

    const Data = JSON.parse(dataString);

    //send date (function call back is called just after)
    XmlHttpRequest.send(JSON.stringify(Data));
}

//for all observer in components
const observers = new Map();
