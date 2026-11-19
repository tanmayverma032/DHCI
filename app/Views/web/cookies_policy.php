<!-- START HEADER -->
<?php include("inc/header.php"); ?>
<!-- END HEADER -->

<!-- START HERO SECTION -->
<section class="cookies-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-badge mb-3">
                    <span class="badge-shield">
                        <i class="fas fa-cookie-bite"></i> Cookies Policy
                    </span>
                </div>
                <h1 class="hero-title">Cookies Policy</h1>
                <p class="hero-subtitle">Learn how DHCI uses cookies to improve your browsing experience and provide personalized services.</p>
               
            </div>
        </div>
    </div>
</section>
<!-- END HERO SECTION -->

<!-- START SECTION FEATURE -->
<section class="cookies-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <!-- Sidebar Navigation -->
                <div class="cookies-sidebar sticky-top">
                    <div class="sidebar-card">
                        <h6 class="sidebar-title">Table of Contents</h6>
                        <ul class="sidebar-nav">
                            <li><a href="#section1" class="nav-link active"><i class="fas fa-info-circle"></i> 1. Use of Cookies</a></li>
                            <li><a href="#section2" class="nav-link"><i class="fas fa-th-list"></i> 2. Types of Cookies</a></li>
                            <li><a href="#section3" class="nav-link"><i class="fas fa-bullseye"></i> 3. Purpose</a></li>
                            <li><a href="#section4" class="nav-link"><i class="fas fa-sliders-h"></i> 4. User Control</a></li>
                            <li><a href="#section5" class="nav-link"><i class="fas fa-handshake"></i> 5. Consent</a></li>
                        </ul>
                    </div>
                    <div class="sidebar-card mt-3">
                        <div class="contact-support">
                            <i class="fas fa-headset"></i>
                            <h6>Questions?</h6>
                            <p>Contact our privacy team</p>
                            <a href="mailto:privacy@dhci.in" class="btn-support">privacy@dhci.in</a>
                        </div>
                    </div>
                    <div class="sidebar-card mt-3 cookie-preferences">
                        <div class="cookie-settings">
                            <i class="fas fa-cog"></i>
                            <h6>Cookie Settings</h6>
                            <p>Customize your cookie preferences</p>
                            <button class="btn-cookie-settings" onclick="showCookiePreferences()">
                                <i class="fas fa-sliders-h"></i> Manage Cookies
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <!-- Cookie Banner Notification -->
                <div class="cookie-notice-banner" id="cookieBanner">
                    <div class="cookie-banner-content">
                        <div class="cookie-banner-icon">
                            <i class="fas fa-cookie"></i>
                        </div>
                        <div class="cookie-banner-text">
                            <h6>🍪 We Value Your Privacy</h6>
                            <p>We use cookies to enhance your browsing experience, analyze site traffic, and personalize content. By continuing to use our site, you consent to our use of cookies.</p>
                        </div>
                        <div class="cookie-banner-actions">
                            <button class="btn-cookie-accept" onclick="acceptCookies()">
                                <i class="fas fa-check"></i> Accept All
                            </button>
                            <button class="btn-cookie-settings-small" onclick="showCookiePreferences()">
                                <i class="fas fa-sliders-h"></i> Settings
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Section 1: Use of Cookies -->
                <div class="cookies-card" id="section1">
                    <div class="card-header-section">
                        <span class="section-number">01</span>
                        <h3>Use of Cookies</h3>
                    </div>
                    <div class="use-cookies-box">
                        <div class="use-icon">
                            <i class="fas fa-cookie-bite"></i>
                        </div>
                        <div class="use-content">
                            <p>DHCI uses cookies to enhance website functionality and user experience. Cookies help us understand how you interact with our website and enable us to provide you with a seamless browsing experience.</p>
                            <div class="use-highlights">
                                <span><i class="fas fa-check-circle"></i> Enhanced functionality</span>
                                <span><i class="fas fa-check-circle"></i> Better user experience</span>
                                <span><i class="fas fa-check-circle"></i> Performance optimization</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: Types of Cookies -->
                <div class="cookies-card" id="section2">
                    <div class="card-header-section">
                        <span class="section-number">02</span>
                        <h3>Types of Cookies</h3>
                    </div>
                    <p class="section-intro">We use different types of cookies to provide you with the best possible experience:</p>
                    <div class="cookie-types-grid">
                        <div class="cookie-type essential">
                            <div class="cookie-type-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h6>Essential Cookies</h6>
                            <span class="cookie-badge required">Required</span>
                            <p>Necessary for basic website functionality and security</p>
                            <div class="cookie-status">
                                <span class="status-active"><i class="fas fa-circle"></i> Always Active</span>
                            </div>
                        </div>
                        <div class="cookie-type performance">
                            <div class="cookie-type-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h6>Performance Cookies</h6>
                            <span class="cookie-badge optional">Optional</span>
                            <p>Help us analyze site traffic and improve performance</p>
                            <div class="cookie-status">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-type functional">
                            <div class="cookie-type-icon">
                                <i class="fas fa-user-cog"></i>
                            </div>
                            <h6>Functional Cookies</h6>
                            <span class="cookie-badge optional">Optional</span>
                            <p>Remember your preferences and personalize content</p>
                            <div class="cookie-status">
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="cookie-type marketing">
                            <div class="cookie-type-icon">
                                <i class="fas fa-ad"></i>
                            </div>
                            <h6>Marketing Cookies</h6>
                            <span class="cookie-badge optional">Optional</span>
                            <p>Deliver relevant advertisements and campaigns</p>
                            <div class="cookie-status">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 3: Purpose -->
                <div class="cookies-card" id="section3">
                    <div class="card-header-section">
                        <span class="section-number">03</span>
                        <h3>Purpose</h3>
                    </div>
                    <div class="purpose-grid">
                        <div class="purpose-item">
                            <div class="purpose-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <h6>Improve Performance</h6>
                            <p>Enhance website speed, usability, and overall performance</p>
                        </div>
                        <div class="purpose-item">
                            <div class="purpose-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <h6>Analyze Behavior</h6>
                            <p>Understand how users interact with our website</p>
                        </div>
                        <div class="purpose-item">
                            <div class="purpose-icon">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <h6>Deliver Content</h6>
                            <p>Provide relevant content, updates, and advertisements</p>
                        </div>
                    </div>
                </div>

                <!-- Section 4: User Control -->
                <div class="cookies-card" id="section4">
                    <div class="card-header-section">
                        <span class="section-number">04</span>
                        <h3>User Control</h3>
                    </div>
                    <div class="control-box">
                        <div class="control-icon">
                            <i class="fas fa-sliders-h"></i>
                        </div>
                        <div class="control-content">
                            <p>You have full control over your cookie preferences. You can manage or disable cookies through your browser settings at any time.</p>
                            <div class="control-steps">
                                <div class="step">
                                    <span class="step-number">1</span>
                                    <div>
                                        <h6>Browser Settings</h6>
                                        <p>Access your browser's privacy or settings menu</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">2</span>
                                    <div>
                                        <h6>Cookie Options</h6>
                                        <p>Find cookie preferences or site data settings</p>
                                    </div>
                                </div>
                                <div class="step">
                                    <span class="step-number">3</span>
                                    <div>
                                        <h6>Manage Cookies</h6>
                                        <p>Enable, disable, or clear cookies as desired</p>
                                    </div>
                                </div>
                            </div>
                            <div class="control-note">
                                <i class="fas fa-info-circle"></i>
                                <span>Note: Disabling cookies may affect certain website functionalities</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 5: Consent -->
                <div class="cookies-card highlight-card" id="section5">
                    <div class="card-header-section">
                        <span class="section-number success">05</span>
                        <h3>Consent</h3>
                    </div>
                    <div class="consent-box">
                        <div class="consent-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="consent-content">
                            <p>By continuing to use our website, you agree to our use of cookies as outlined in this policy.</p>
                            <div class="consent-actions">
                                <button class="btn-consent-accept" onclick="acceptCookies()">
                                    <i class="fas fa-check"></i> Accept Cookies
                                </button>
                                <button class="btn-consent-learn" onclick="showCookiePreferences()">
                                    <i class="fas fa-cog"></i> Customize Settings
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Back to Top -->
                <div class="text-center mt-4">
                    <a href="#" class="btn-back-top"><i class="fas fa-arrow-up"></i> Back to Top</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION FEATURE -->

<style>
    /* ===== COOKIES HERO SECTION ===== */
.cookies-hero {
    background: linear-gradient(135deg, #1a0a0a 0%, #2d1a0a 50%, #1a1a0a 100%);
    padding: 100px 0 80px;
    position: relative;
    overflow: hidden;
}

.cookies-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(243, 156, 18, 0.1) 0%, transparent 70%);
    border-radius: 50%;
}

.cookies-hero::after {
    content: '';
    position: absolute;
    bottom: -30%;
    left: -10%;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(243, 156, 18, 0.08) 0%, transparent 70%);
    border-radius: 50%;
}

.badge-shield {
    display: inline-block;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    padding: 8px 20px;
    border-radius: 50px;
    color: #f39c12;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: 0.5px;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.badge-shield i {
    margin-right: 8px;
}

.hero-title {
    font-size: 52px;
    font-weight: 800;
    color: #ffffff;
    margin: 20px 0 15px;
    letter-spacing: -1px;
}

.hero-subtitle {
    font-size: 18px;
    color: rgba(255, 255, 255, 0.8);
    max-width: 700px;
    margin: 0 auto 25px;
    line-height: 1.8;
}

.hero-meta {
    display: flex;
    justify-content: center;
    gap: 30px;
    color: rgba(255, 255, 255, 0.6);
    font-size: 14px;
}

.hero-meta span i {
    margin-right: 6px;
}

/* ===== COOKIES CONTENT ===== */
.cookies-content {
    padding: 60px 0 80px;
    background: #faf8f5;
}

/* ===== SIDEBAR ===== */
.cookies-sidebar {
    top: 100px;
}

.sidebar-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 25px 20px;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(0, 0, 0, 0.04);
}

.sidebar-card.cookie-preferences {
    background: linear-gradient(135deg, #fff8e8 0%, #fff0d8 100%);
    border: 2px solid #f39c12;
}

.sidebar-title {
    font-weight: 700;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #1a1a2e;
    margin-bottom: 15px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f0f2f5;
}

.sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar-nav li {
    margin-bottom: 4px;
}

.sidebar-nav .nav-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px 12px;
    color: #4a5568;
    font-size: 13px;
    border-radius: 8px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.sidebar-nav .nav-link i {
    font-size: 13px;
    width: 18px;
}

.sidebar-nav .nav-link:hover,
.sidebar-nav .nav-link.active {
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: #ffffff;
    transform: translateX(5px);
}

.contact-support {
    text-align: center;
}

.contact-support i {
    font-size: 32px;
    color: #f39c12;
    margin-bottom: 10px;
}

.contact-support h6 {
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 5px;
}

.contact-support p {
    font-size: 13px;
    color: #7a8ba3;
    margin-bottom: 12px;
}

.btn-support {
    display: inline-block;
    padding: 8px 20px;
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: #fff !important;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-support:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
}

.cookie-settings {
    text-align: center;
}

.cookie-settings i {
    font-size: 36px;
    color: #f39c12;
    margin-bottom: 10px;
}

.cookie-settings h6 {
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 5px;
}

.cookie-settings p {
    font-size: 13px;
    color: #7a8ba3;
    margin-bottom: 12px;
}

.btn-cookie-settings {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 25px;
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: #fff !important;
    border: none;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-cookie-settings:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
}

/* ===== COOKIE NOTICE BANNER ===== */
.cookie-notice-banner {
    background: #1a1a2e;
    border-radius: 16px;
    padding: 20px 25px;
    margin-bottom: 30px;
    border-left: 5px solid #f39c12;
    display: none;
}

.cookie-notice-banner.show {
    display: block;
    animation: slideDown 0.5s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.cookie-banner-content {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
}

.cookie-banner-icon i {
    font-size: 36px;
    color: #f39c12;
}

.cookie-banner-text {
    flex: 1;
    min-width: 200px;
}

.cookie-banner-text h6 {
    color: #fff;
    font-weight: 700;
    margin-bottom: 5px;
}

.cookie-banner-text p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin: 0;
    line-height: 1.5;
}

.cookie-banner-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.btn-cookie-accept {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 25px;
    background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
    color: #fff;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-cookie-accept:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(39, 174, 96, 0.3);
}

.btn-cookie-settings-small {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-cookie-settings-small:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* ===== COOKIES CARDS ===== */
.cookies-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 30px;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(0, 0, 0, 0.04);
    transition: all 0.3s ease;
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
}

.cookies-card:hover {
    box-shadow: 0 8px 40px rgba(0, 0, 0, 0.08);
    transform: translateY(-2px);
}

.cookies-card.highlight-card {
    background: linear-gradient(135deg, #f0f9ff 0%, #e8f5e9 100%);
    border: 2px solid #27ae60;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.cookies-card:nth-child(1) { animation-delay: 0.1s; }
.cookies-card:nth-child(2) { animation-delay: 0.2s; }
.cookies-card:nth-child(3) { animation-delay: 0.3s; }
.cookies-card:nth-child(4) { animation-delay: 0.4s; }
.cookies-card:nth-child(5) { animation-delay: 0.5s; }

.card-header-section {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.section-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 44px;
    height: 44px;
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: #fff;
    border-radius: 12px;
    font-size: 16px;
    font-weight: 800;
    flex-shrink: 0;
}

.section-number.success {
    background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
}

.card-header-section h3 {
    font-size: 24px;
    font-weight: 700;
    color: #1a1a2e;
    margin: 0;
}

.section-intro {
    color: #4a5568;
    font-size: 16px;
    margin-bottom: 25px;
    padding-left: 60px;
}

/* ===== USE COOKIES BOX ===== */
.use-cookies-box {
    display: flex;
    gap: 25px;
    padding: 25px 30px;
    background: linear-gradient(135deg, rgba(243, 156, 18, 0.05) 0%, rgba(230, 126, 34, 0.05) 100%);
    border-radius: 16px;
    border-left: 5px solid #f39c12;
    padding-left: 60px;
}

.use-icon i {
    font-size: 40px;
    color: #f39c12;
}

.use-content p {
    font-size: 15px;
    color: #2d1a0a;
    margin-bottom: 15px;
    line-height: 1.6;
}

.use-highlights {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.use-highlights span {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    color: #4a5568;
}

.use-highlights span i {
    color: #27ae60;
}

/* ===== COOKIE TYPES GRID ===== */
.cookie-types-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    padding-left: 60px;
}

.cookie-type {
    padding: 25px 20px;
    border-radius: 16px;
    text-align: center;
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.cookie-type:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.cookie-type.essential {
    background: linear-gradient(135deg, #f0f4ff 0%, #e8eeff 100%);
    border-color: #4a90e2;
}

.cookie-type.performance {
    background: linear-gradient(135deg, #f0fff4 0%, #e8f5e9 100%);
    border-color: #27ae60;
}

.cookie-type.functional {
    background: linear-gradient(135deg, #fff8f0 0%, #ffecdb 100%);
    border-color: #f39c12;
}

.cookie-type.marketing {
    background: linear-gradient(135deg, #fdf0f0 0%, #fce4e4 100%);
    border-color: #e74c3c;
}

.cookie-type-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    margin: 0 auto 12px;
}

.cookie-type.essential .cookie-type-icon {
    background: linear-gradient(135deg, #4a90e2 0%, #357abd 100%);
}

.cookie-type.performance .cookie-type-icon {
    background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
}

.cookie-type.functional .cookie-type-icon {
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
}

.cookie-type.marketing .cookie-type-icon {
    background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
}

.cookie-type h6 {
    font-weight: 700;
    color: #1a1a2e;
    margin-bottom: 5px;
}

.cookie-badge {
    display: inline-block;
    padding: 2px 12px;
    border-radius: 50px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 10px;
}

.cookie-badge.required {
    background: #4a90e2;
    color: #fff;
}

.cookie-badge.optional {
    background: #e0e0e0;
    color: #4a5568;
}

.cookie-type p {
    font-size: 13px;
    color: #7a8ba3;
    margin-bottom: 12px;
    line-height: 1.4;
}

.cookie-status {
    display: flex;
    justify-content: center;
    align-items: center;
}

.status-active {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 12px;
    color: #27ae60;
    font-weight: 600;
}

.status-active i {
    font-size: 8px;
}

/* ===== SWITCH TOGGLE ===== */
.switch {
    position: relative;
    display: inline-block;
    width: 44px;
    height: 24px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.4s;
    border-radius: 34px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: 0.4s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #27ae60;
}

input:checked + .slider:before {
    transform: translateX(20px);
}

.slider.round {
    border-radius: 34px;
}

.slider.round:before {
    border-radius: 50%;
}

/* ===== PURPOSE GRID ===== */
.purpose-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    padding-left: 60px;
}

.purpose-item {
    text-align: center;
    padding: 25px 20px;
    background: #f8fafc;
    border-radius: 16px;
    transition: all 0.3s ease;
}

.purpose-item:hover {
    background: #fff8f0;
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(243, 156, 18, 0.08);
}

.purpose-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 24px;
    margin: 0 auto 15px;
}

.purpose-item h6 {
    font-weight: 600;
    color: #1a1a2e;
    margin-bottom: 8px;
}

.purpose-item p {
    font-size: 13px;
    color: #7a8ba3;
    margin: 0;
    line-height: 1.5;
}

/* ===== CONTROL BOX ===== */
.control-box {
    display: flex;
    gap: 25px;
    padding-left: 60px;
}

.control-icon i {
    font-size: 40px;
    color: #f39c12;
}

.control-content p {
    font-size: 15px;
    color: #2d1a0a;
    margin-bottom: 20px;
    line-height: 1.6;
}

.control-steps {
    display: flex;
    flex-direction: column;
    gap: 15px;
    margin-bottom: 20px;
}

.step {
    display: flex;
    gap: 15px;
    align-items: flex-start;
}

.step-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    min-width: 32px;
    background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
    color: #fff;
    border-radius: 50%;
    font-size: 14px;
    font-weight: 700;
}

.step h6 {
    font-weight: 600;
    color: #1a1a2e;
    margin-bottom: 2px;
}

.step p {
    font-size: 13px;
    color: #7a8ba3;
    margin: 0;
}

.control-note {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 18px;
    background: rgba(243, 156, 18, 0.1);
    border-radius: 8px;
}

.control-note i {
    color: #f39c12;
    font-size: 18px;
}

.control-note span {
    font-size: 14px;
    color: #4a5568;
}

/* ===== CONSENT BOX ===== */
.consent-box {
    display: flex;
    gap: 25px;
    padding: 25px 30px;
    background: linear-gradient(135deg, rgba(39, 174, 96, 0.05) 0%, rgba(46, 204, 113, 0.05) 100%);
    border-radius: 16px;
    border: 2px solid #27ae60;
    padding-left: 60px;
}

.consent-icon i {
    font-size: 48px;
    color: #27ae60;
}

.consent-content p {
    font-size: 16px;
    color: #1a2a1a;
    margin-bottom: 15px;
    line-height: 1.6;
}

.consent-actions {
    display: flex;
    gap: 15px;
    flex-wrap: wrap;
}

.btn-consent-accept {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 30px;
    background: linear-gradient(135deg, #27ae60 0%, #1e8449 100%);
    color: #fff !important;
    border: none;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-consent-accept:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
}

.btn-consent-learn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 30px;
    background: #ffffff;
    color: #1a1a2e !important;
    border: 2px solid #e0e0e0;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}

.btn-consent-learn:hover {
    border-color: #f39c12;
    color: #e67e22 !important;
    transform: translateY(-2px);
}

/* ===== BACK TO TOP ===== */
.btn-back-top {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 12px 30px;
    background: #ffffff;
    color: #1a1a2e;
    border-radius: 50px;
    font-size: 14px;
    font-weight: 600;
   
</style>

<!-- START FOOTER -->
<?php include("inc/footer.php"); ?>
<!-- END FOOTER -->