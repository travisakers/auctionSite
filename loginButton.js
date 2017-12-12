$(document)
		.ready(
				function() {
					$('#loginSubmitButton')
							.click(
									function(e) {
										e.preventDefault();
										alert("submit clicked");

										if ($("#usernameLogin").val() == '') {
											alert("Please fill in the username");
										} else if ($("#passwordLogin").val() == '') {
											alert("Please fill in the password");
										} else {
											$
													.ajax({
														type : "POST",
														url : "login_test.php",
														data : $('form')
																.serialize(),
														cache : false,
														success : function(
																result) {
															console.log(result);
															if (result == "Please enter correct username and password") {
																alert("Please enter correct username and password");
															} else {
																alert("you are logged in");
																alert(result);// successfully
																				// gets
																				// the
																				// username
																/*$(
																		"a:contains('Login')")
																		.load(
																				"auction.html",
																				result);*/// code
																						// to
																						// change
																						// the
																						// login
																						// to
																						// username
																location.href = "auction.html";

															}
														},
														error : function() {
															console
																	.log("WRONG");
														}
													});
											return false;
										}

									});

				});