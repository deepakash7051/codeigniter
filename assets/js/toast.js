	function alert_alert() {
		notify({
			type: "alert", //alert | success | error | warning | info
			title: "Alert",
			message: "jQuery Notify.js Demo. Super simple Notify plugin.",
			position: {
				x: "right", //right | left | center
				y: "top" //top | bottom | center
			},
			icon: '<img src="assets/images/paper_plane.png" />', //<i>
			size: "normal", //normal | full | small
			overlay: false, //true | false
			closeBtn: true, //true | false
			overflowHide: false, //true | false
			spacing: 20, //number px
			theme: "default", //default | dark-theme
			autoHide: true, //true | false
			delay: 2500, //number ms
			onShow: null, //function
			onClick: null, //function
			onHide: null, //function
			template: '<div class="notify"><div class="notify-text"></div></div>'
		});
	}

	function alert_success(msg) {
		notify({
			type: "success", //alert | success | error | warning | info
			title: "Success",
			position: {
				x: "right", //right | left | center
				y: "top" //top | bottom | center
			},
			icon: '<img src="assets/images/paper_plane.png" />',
			message: msg
		});
	}

	function alert_warning() {
		notify({
			type: "warning", //alert | success | error | warning | info
			title: "Warning",
			theme: "dark-theme",
			position: {
				x: "right", //right | left | center
				y: "top" //top | bottom | center
			},
			icon: '<img src="assets/images/paper_plane.png" />',
			message: "jQuery Notify.js Demo. Super simple Notify plugin."
		});
	}

	function alert_danger(msg) {
		notify({
			type: "error", //alert | success | error | warning | info
			title: "Error",
			theme: "dark-theme",
			position: {
				x: "right", //right | left | center
				y: "top" //top | bottom | center
			},
			icon: '<img src="assets/images/paper_plane.png" />',
			message: msg
		});
	}

	function alert_info() {
		notify({
			type: "info", //alert | success | error | warning | info
			title: "Info",
			theme: "dark-theme",
			position: {
				x: "right", //right | left | center
				y: "top" //top | bottom | center
			},
			icon: '<img src="assets/images/paper_plane.png" />',
			message: "jQuery Notify.js Demo. Super simple Notify plugin."
		});
	}