var options = {
	    whatsapp: "+6281337398840",
	    call: "+6281337398840",
	   // facebook: "654058111596256",
	    email: "admin@balidentalclinic.com", 
	    company_logo_url: "https://scontent-sit4-1.cdninstagram.com/vp/f43e03d306e95e2f2d74e32d2afe4f9d/5C36330F/t51.2885-19/s150x150/37675232_207309010125546_2609462390625927168_n.jpg",
	    greeting_message: "Hello, how may we help you? Just send us a message now to get assistance.",
	    call_to_action: "Ask Our Team",
	    button_color: "#bd336d",
	    position: "right",
	    order: "facebook,whatsapp,call,email"
	};

var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
	s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);