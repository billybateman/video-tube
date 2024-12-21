<div class="content-body">
    <!-- row -->
	<div class="container-fluid">
        
        <div class="settings-menu-links">
            <ul class="nav nav-tabs menu-tabs">
                <li class="nav-item active">
                    <a class="nav-link" href="settings.html">General Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="localization-details.html">Localization</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="payment-settings.html">Payment Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="email-settings.html">Email Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="social-settings.html">Social Media Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="social-links.html">Social Links</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="seo-settings.html">SEO Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="theme-settings.html">Theme Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="change-password.html">Change Password</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="others-settings.html">Others</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Website Basic Details</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form>
                        <div class="settings-form">
                            <div class="input-block">
                                <label>Website Name <span class="star-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Website Name">
                            </div>
                            <div class="input-block ">
                                <p class="settings-label">Logo <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input type="file" accept="image/*" name="image" id="file" onchange="if (!window.__cfRLUnblockHandlers) return false; loadFile(event)" class="hide-input">
                                    <label for="file" class="upload">
                                    <i class="feather-upload"></i>
                                    </label>
                                </div>
                                <h6 class="settings-size">Recommended image size is <span>150px x 150px</span></h6>
                                <div class="upload-images">
                                    <img src="/assets/admin/img/logo-dark.png" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                    <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="input-block">
                                <p class="settings-label">Favicon <span class="star-red">*</span></p>
                                <div class="settings-btn">
                                    <input type="file" accept="image/*" name="image" id="files" onchange="if (!window.__cfRLUnblockHandlers) return false; loadFile(event)" class="hide-input">
                                    <label for="file" class="upload">
                                    <i class="feather-upload"></i>
                                    </label>
                                </div>
                                <h6 class="settings-size">
                                    Recommended image size is <span>16px x 16px or 32px x 32px</span>
                                </h6>
                                <h6 class="settings-size mt-1">Accepted formats: only png and ico</h6>
                                <div class="upload-images upload-size">
                                    <img src="/assets/admin/img/favicon.png" alt="Image">
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                    <i class="feather-x-circle"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <div class="input-block">
                                    <div class="status-toggle d-flex justify-content-between align-items-center">
                                        <p class="mb-0">RTL</p>
                                        <input type="checkbox" id="status_1" class="check">
                                        <label for="status_1" class="checktoggle">checkbox</label>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="input-block mb-0">
                                <div class="settings-btns">
                                    <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Update</button>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-secondary btn-rounded">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Address Details</h5>
                    </div>
                    <div class="card-body pt-0">
                        <form>
                        <div class="settings-form">
                            <div class="input-block">
                                <label>Address Line 1 <span class="star-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Address Line 1">
                            </div>
                            <div class="input-block">
                                <label>Address Line 2 <span class="star-red">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Address Line 2">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-block">
                                    <label>City <span class="star-red">*</span></label>
                                    <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block">
                                    <label>State/Province <span class="star-red">*</span></label>
                                    <select class="select form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option selected="selected">Select</option>
                                        <option>California</option>
                                        <option>Tasmania</option>
                                        <option>Auckland</option>
                                        <option>Marlborough</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-685w-container"><span class="select2-selection__rendered" id="select2-685w-container" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block">
                                    <label>Zip/Postal Code <span class="star-red">*</span></label>
                                    <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-block">
                                    <label>Country <span class="star-red">*</span></label>
                                    <select class="select form-control select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option selected="selected">Select</option>
                                        <option>India</option>
                                        <option>London</option>
                                        <option>France</option>
                                        <option>USA</option>
                                    </select>
                                    <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-wjty-container"><span class="select2-selection__rendered" id="select2-wjty-container" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-block mb-0">
                                <div class="settings-btns">
                                    <button type="submit" class="border-0 btn btn-primary btn-gradient-primary btn-rounded">Update</button>&nbsp;&nbsp;
                                    <button type="submit" class="btn btn-secondary btn-rounded">Cancel</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
    </div>
</div>