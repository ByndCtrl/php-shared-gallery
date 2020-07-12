<?php
require APP_ROOT . '/Views/Templates/Head.tmpl.php'; ?>
<?php
require APP_ROOT . '/Views/Templates/Nav.tmpl.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>

        <!-- Register Form -->
        <div class="col-6 register-form">
            <form method="post" action="<?= URL_ROOT; ?>register" autocomplete="off">

                <!-- Username -->
                <div class="form-group">
                    <label for="input-username">Username</label>
                    <input type="text" name="username" id="input-username" value="<?= $data['username']; ?>"
                           class="form-control <?= (!empty($errors['usernameError'])) ? 'is-invalid' : ''; ?>"
                           placeholder="Username" aria-describedby="help-username">
                    <small id="help-username" class="text-muted"></small>
                    <small id="error-username" class="text-danger"><?php
                        if (!empty($errors['usernameError'])) {
                            echo $errors['usernameError'];
                        } ?></small>
                </div>

                <!-- E-mail -->
                <div class="form-group">
                    <label for="input-email">E-mail</label>
                    <input type="email" name="email" id="input-email" value="<?= $data['email']; ?>"
                           class="form-control <?= (!empty($errors['emailError'])) ? 'is-invalid' : ''; ?>"
                           placeholder="E-mail" aria-describedby="help-email">
                    <small id="help-email" class="text-muted"></small>
                    <small id="error-email" class="text-danger"><?php
                        if (!empty($errors['emailError'])) {
                            echo $errors['emailError'];
                        } ?></small>
                </div>

                <div class="form-row">

                    <!-- Password -->
                    <div class="form-group col-6">
                        <label for="input-password">Password</label>
                        <input type="password" name="password" id="input-password" value="<?= $data['password']; ?>"
                               class="form-control <?= (!empty($errors['passwordError'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Password" aria-describedby="help-password" autocomplete="off">
                        <small id="help-password" class="text-muted"></small>
                        <small id="error-password" class="text-danger"><?php
                            if (!empty($errors['passwordError'])) {
                                echo $errors['passwordError'];
                            } ?></small>
                    </div>

                    <!-- Confirm Password-->
                    <div class="form-group col-6">
                        <label for="input-confirm-password">Confirm password</label>
                        <input type="password" name="confirmPassword" id="input-confirm-password"
                               value="<?= $data['confirmPassword']; ?>"
                               class="form-control <?= (!empty($errors['confirmPasswordError'])) ? 'is-invalid' : ''; ?>"
                               placeholder="Password" autocomplete="off" aria-describedby="help-confirm-password">
                        <small id="help-confirm-password" class="text-muted"></small>
                        <small id="error-confirm-password" class="text-danger"><?php
                            if (!empty($errors['confirmPasswordError'])) {
                                echo $errors['confirmPasswordError'];
                            } ?></small>
                    </div>

                </div>

                <!-- Show Password -->
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="show-password" onclick="showPassword();">
                    <label class="form-check-label" for="show-password"><small>Show password</small></label>
                </div>

                <!-- Street Address -->
                <div class="form-group">
                    <label for="input-street-address">Street Address</label>
                    <input type="text" name="streetAddress" id="input-street-address"
                           value="<?= $data['streetAddress']; ?>"
                           class="form-control <?= (!empty($errors['streetAddressError'])) ? 'is-invalid' : ''; ?>"
                           placeholder="1234 Main St" aria-describedby="help-street-address">
                    <small id="help-street-address" class="text-muted"></small>
                    <small id="error-street-address" class="text-danger"><?php
                        if (!empty($errors['streetAddressError'])) {
                            echo $errors['streetAddressError'];
                        } ?></small>
                </div>

                <div class="form-row">

                    <!-- City -->
                    <div class="form-group col-8">
                        <label for="input-city">City</label>
                        <input type="text" name="city" id="input-city" value="<?= $data['city']; ?>"
                               class="form-control <?= (!empty($errors['cityError'])) ? 'is-invalid' : ''; ?>"
                               placeholder="New York">
                        <small id="help-city" class="text-muted"></small>
                        <small id="error-city" class="text-danger"><?php
                            if (!empty($errors['cityError'])) {
                                echo $errors['cityError'];
                            } ?></small>
                    </div>

                    <!-- Postcode -->
                    <div class="form-group col-4">
                        <label for="input-postcode">Postcode</label>
                        <input type="text" name="postcode" id="input-postcode" value="<?= $data['postcode']; ?>"
                               class="form-control <?= (!empty($errors['postcodeError'])) ? 'is-invalid' : ''; ?>"
                               placeholder="10001" aria-describedby="help-postcode">
                        <small id="help-postcode" class="text-muted"></small>
                        <small id="error-postcode" class="text-danger"><?php
                            if (!empty($errors['postcodeError'])) {
                                echo $errors['postcodeError'];
                            } ?></small>
                    </div>

                </div>

                <!-- Country -->
                <div class="form-group">
                    <label for="input-country">Country</label>
                    <select name="country" id="input-country"
                            class="custom-select <?= (!empty($errors['countryError'])) ? 'is-invalid' : ''; ?>"
                            aria-describedby="help-country">
                        <option value=""></option>
                        <option selected value="<?= $data['country']; ?>"><?= $data['country']; ?></option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Anguilla">Anguilla</option>
                        <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
                        <option value="Australia">Australia</option>
                        <option value="Austria">Austria</option>
                        <option value="Azerbaijan">Azerbaijan</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Bahrain">Bahrain</option>
                        <option value="Bangladesh">Bangladesh</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belarus">Belarus</option>
                        <option value="Belgium">Belgium</option>
                        <option value="Belize">Belize</option>
                        <option value="Benin">Benin</option>
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Bonaire">Bonaire</option>
                        <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="Brazil">Brazil</option>
                        <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="Burkina Faso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Canary Islands">Canary Islands</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="Cayman Islands">Cayman Islands</option>
                        <option value="Central African Republic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Channel Islands">Channel Islands</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="Christmas Island">Christmas Island</option>
                        <option value="Cocos Island">Cocos Island</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="Cook Islands">Cook Islands</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cote DIvoire">Cote DIvoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Curacao">Curacao</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="Czech Republic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Dominican Republic">Dominican Republic</option>
                        <option value="East Timor">East Timor</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                        <option value="Falkland Islands">Falkland Islands</option>
                        <option value="Faroe Islands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="French Guiana">French Guiana</option>
                        <option value="French Polynesia">French Polynesia</option>
                        <option value="French Southern Ter">French Southern Ter</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Great Britain">Great Britain</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Hawaii">Hawaii</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Hong Kong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="India">India</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Isle of Man">Isle of Man</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="Korea North">Korea North</option>
                        <option value="Korea South">Korea South</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Laos">Laos</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="Libya">Libya</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macau">Macau</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="Marshall Islands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Midway Islands">Midway Islands</option>
                        <option value="Moldova">Moldova</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Nambia">Nambia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherland Antilles">Netherland Antilles</option>
                        <option value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option value="Nevis">Nevis</option>
                        <option value="New Caledonia">New Caledonia</option>
                        <option value="New Zealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="Norfolk Island">Norfolk Island</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau Island">Palau Island</option>
                        <option value="Palestine">Palestine</option>
                        <option value="Panama">Panama</option>
                        <option value="Papua New Guinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn Island">Pitcairn Island</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="Puerto Rico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Republic of Montenegro">Republic of Montenegro</option>
                        <option value="Republic of Serbia">Republic of Serbia</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="St Barthelemy">St Barthelemy</option>
                        <option value="St Eustatius">St Eustatius</option>
                        <option value="St Helena">St Helena</option>
                        <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option value="St Lucia">St Lucia</option>
                        <option value="St Maarten">St Maarten</option>
                        <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option value="Saipan">Saipan</option>
                        <option value="Samoa">Samoa</option>
                        <option value="Samoa American">Samoa American</option>
                        <option value="San Marino">San Marino</option>
                        <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option value="Saudi Arabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="Sierra Leone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="Solomon Islands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Spain">Spain</option>
                        <option value="Sri Lanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syria</option>
                        <option value="Tahiti">Tahiti</option>
                        <option value="Taiwan">Taiwan</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="United Arab Erimates">United Arab Emirates</option>
                        <option value="United States of America">United States of America</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="Vatican City State">Vatican City State</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option value="Wake Island">Wake Island</option>
                        <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zaire">Zaire</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>
                    </select>
                    <small id="help-country" class="text-muted"></small>
                    <small id="error-country" class="text-danger"><?php
                        if (!empty($errors['countryError'])) {
                            echo $errors['countryError'];
                        } ?></small>
                </div>

                <!-- Register Button -->
                <button type="submit" class="btn btn-dark btn-block" value="Register">REGISTER</button>

                <div class="form-group login-redirect">
                    <small class="">Have an account? <a href="<?= URL_ROOT . 'login' ?>">Login here</a>.</small>
                </div>
            </form>
        </div>

        <div class="col-3"></div>
    </div>
</div>

<?php
require APP_ROOT . '/Views/Templates/Footer.tmpl.php'; ?>
