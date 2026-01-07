<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Babl - نظام إدارة المطاعم</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }

        :root {
            --primary-color: #FFB800;
            --dark-blue: #1a2332;
            --light-bg: #f8f9fa;
        }

        body {
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: var(--dark-blue);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-login {
            border: 1px solid var(--primary-color);
            color: var(--primary-color) !important;
            padding: 0.5rem 1.5rem;
            border-radius: 5px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: var(--primary-color);
            color: var(--dark-blue) !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--dark-blue) 0%, #2d3e50 100%);
            min-height: 90vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="rgba(255,184,0,0.05)"/></svg>');
            background-size: 200px;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 900;
            color: white;
            line-height: 1.3;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease;
        }

        .hero-title .highlight {
            color: var(--primary-color);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.2s both;
        }

        .hero-buttons {
            animation: fadeInUp 1s ease 0.4s both;
        }

        .btn-primary-custom {
            background: var(--primary-color);
            color: var(--dark-blue);
            padding: 0.8rem 2rem;
            border-radius: 5px;
            font-weight: 600;
            border: none;
            transition: all 0.3s;
            margin-left: 1rem;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(255, 184, 0, 0.4);
        }

        .btn-secondary-custom {
            background: transparent;
            color: white;
            padding: 0.8rem 2rem;
            border-radius: 5px;
            font-weight: 600;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s;
        }

        .btn-secondary-custom:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: white;
        }

        .hero-image {
            animation: fadeInRight 1s ease 0.5s both;
        }

        .hero-image img {
            max-width: 100%;
            filter: drop-shadow(0 20px 40px rgba(0, 0, 0, 0.3));
        }

        /* Features Section */
        .features-section {
            padding: 5rem 0;
            background: white;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 3rem;
        }

        .feature-card {
            text-align: center;
            padding: 2rem;
            transition: all 0.3s;
            border-radius: 10px;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color) 0%, #ffd700 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #666;
            font-size: 0.95rem;
        }

        /* Services Section */
        .services-section {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 1.5rem;
            color: white;
        }

        /* Integration Section */
        .integration-section {
            padding: 5rem 0;
            background: white;
        }

        .integration-image {
            text-align: center;
            margin-bottom: 2rem;
        }

        .integration-image img {
            max-width: 80%;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* Stats Section */
        .stats-section {
            padding: 5rem 0;
            background: var(--dark-blue);
            color: white;
        }

        .stat-item {
            text-align: center;
            padding: 2rem;
        }

        .stat-icon {
            width: 70px;
            height: 70px;
            background: rgba(255, 184, 0, 0.2);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Testimonials */
        .testimonials-section {
            padding: 5rem 0;
            background: var(--light-bg);
        }

        .testimonial-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin: 1rem 0;
        }

        .testimonial-text {
            color: #666;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .author-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-color);
            margin-left: 1rem;
        }

        .author-info h6 {
            margin: 0;
            color: var(--dark-blue);
            font-weight: 600;
        }

        .author-info p {
            margin: 0;
            color: #999;
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 5rem 0;
            background: linear-gradient(135deg, var(--dark-blue) 0%, #2d3e50 100%);
            color: white;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.8);
        }

        /* Footer */
        .footer {
            background: var(--dark-blue);
            color: rgba(255, 255, 255, 0.8);
            padding: 3rem 0 1rem;
        }

        .footer-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--primary-color);
        }

        .social-icons a {
            color: rgba(255, 255, 255, 0.7);
            margin: 0 0.5rem;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: var(--primary-color);
        }

        /* Animations */
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

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span style="color: var(--primary-color);">BABL</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">المميزات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">آراء العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">تواصل معنا</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="#" class="btn-login">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">
                        حل واحد، تحكم كامل،<br>
                        <span class="highlight">نمو مستدام</span>
                    </h1>
                    <p class="hero-subtitle">
                        نوفر منصة متكاملة لإدارة مطعمك بكفاءة واحترافية عالية، مع متابعة دقيقة للمخزون والطلبات
                        والموظفين في مكان واحد
                    </p>
                    <div class="hero-buttons">
                        <button class="btn btn-primary-custom">ابدأ تجربتك المجانية</button>
                        <button class="btn btn-secondary-custom">تواصل معنا</button>
                    </div>
                </div>
                <div class="col-lg-6 hero-image">
                    <div class="position-relative">
                        <div
                            style="width: 120px; height: 120px; background: var(--primary-color); border-radius: 20px; margin: 0 auto 2rem; display: flex; align-items: center; justify-content: center; font-size: 3rem; color: white; box-shadow: 0 20px 40px rgba(255,184,0,0.3);">
                            <i class="fas fa-utensils"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="section-title fade-in">من الإدارة إلى التطوير.. بابل يغطي كل مراحل التشغيل</h2>
            <p class="section-subtitle fade-in">نوفر الحلول الذكية لإدارة مطعمك من البداية للنهاية، لضمان الكفاءة
                والتطوير المستمر في كل مرحلة</p>

            <div class="text-center mb-5">
                <button class="btn btn-primary-custom">ابدأ مجاناً</button>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="feature-title">التقارير</h5>
                        <p class="feature-desc">تقارير مفصلة ودقيقة</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <h5 class="feature-title">إدارة المخزون</h5>
                        <p class="feature-desc">تحكم كامل في المخزون</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <h5 class="feature-title">نظام الطلبات</h5>
                        <p class="feature-desc">إدارة سلسة للطلبات</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 fade-in">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h5 class="feature-title">إدارة الموظفين</h5>
                        <p class="feature-desc">متابعة أداء الفريق</p>
                    </div>
                </div>
            </div>

            <p class="text-center mt-4 text-muted">إدارة شاملة لكل جانب من جوانب مطعمك في مكان واحد</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section" id="services">
        <div class="container">
            <h2 class="section-title fade-in">خدماتنا</h2>
            <p class="section-subtitle fade-in">كل ما يحتاجه عملك</p>

            <div class="row g-4">
                <div class="col-md-4 fade-in">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <h5>نظام نقاط البيع</h5>
                        <p class="text-muted">نظام متكامل وسهل الاستخدام لإدارة المبيعات والطلبات بكفاءة عالية</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-warehouse"></i>
                        </div>
                        <h5>إدارة المخزون</h5>
                        <p class="text-muted">تحكم كامل في المخزون مع تنبيهات ذكية للنواقص وإعادة الطلب</p>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h5>التقارير والتحليلات</h5>
                        <p class="text-muted">تقارير مفصلة ورؤى تحليلية لمساعدتك على اتخاذ قرارات أفضل</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Integration Section -->
    <section class="integration-section">
        <div class="container">
            <h2 class="section-title fade-in">تدرب وواصل معنا لنقاط البيع</h2>
            <p class="section-subtitle fade-in">نوفر لك تدريباً شاملاً وواضحاً على جميع أنظمة بابل لنقاط البيع والإدارة
                لتحقيق أقصى استفادة من التقنية</p>

            <div class="row g-4 mt-4">
                <div class="col-md-4 fade-in">
                    <div class="integration-image">
                        <div
                            style="width: 100%; height: 250px; background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-video" style="font-size: 3rem; color: var(--primary-color);"></i>
                        </div>
                    </div>
                    <h5 class="text-center mt-3">دورات تدريبية شاملة</h5>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="integration-image">
                        <div
                            style="width: 100%; height: 250px; background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-headset" style="font-size: 3rem; color: var(--primary-color);"></i>
                        </div>
                    </div>
                    <h5 class="text-center mt-3">دعم فني مستمر</h5>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="integration-image">
                        <div
                            style="width: 100%; height: 250px; background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas fa-book" style="font-size: 3rem; color: var(--primary-color);"></i>
                        </div>
                    </div>
                    <h5 class="text-center mt-3">أدلة استخدام مفصلة</h5>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <h2 class="section-title text-white fade-in">دعم متميز <span
                    style="color: var(--primary-color);">Unified</span></h2>
            <p class="text-center text-white-50 mb-5 fade-in">نوفر لك دعم متكامل وخدمة عملاء متميزة على مدار الساعة</p>

            <div class="row">
                <div class="col-md-4 fade-in">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">دعم فني مستمر</div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div class="stat-number">+500</div>
                        <div class="stat-label">عميل راضٍ</div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="stat-item">
                        <div class="stat-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="stat-number">4.9</div>
                        <div class="stat-label">تقييم العملاء</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container">
            <h2 class="section-title fade-in">وراء كل مطعم ناجح.. نظام إدارة قوي</h2>
            <p class="section-subtitle fade-in">اكتشف كيف ساعدنا مطاعم أخرى على تحقيق النجاح</p>

            <div class="row g-4 mt-4">
                <div class="col-md-4 fade-in">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                        </div>
                        <p class="testimonial-text">"نظام بابل غير طريقة إدارة مطعمنا بالكامل. أصبحت العمليات أكثر
                            سلاسة والتقارير أوضح بكثير."</p>
                        <div class="testimonial-author">
                            <div class="author-image"></div>
                            <div class="author-info">
                                <h6>أحمد محمد</h6>
                                <p>مدير مطعم النخيل</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                        </div>
                        <p class="testimonial-text">"الدعم الفني ممتاز والنظام سهل الاستخدام. ننصح به بشدة لأصحاب
                            المطاعم."</p>
                        <div class="testimonial-author">
                            <div class="author-image"></div>
                            <div class="author-info">
                                <h6>سارة علي</h6>
                                <p>صاحبة مقهى الزهور</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 fade-in">
                    <div class="testimonial-card">
                        <div class="mb-3">
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                            <i class="fas fa-star" style="color: var(--primary-color);"></i>
                        </div>
                        <p class="testimonial-text">"زادت أرباحنا 40% بعد استخدام بابل. التقارير التفصيلية ساعدتنا على
                            اتخاذ قرارات أفضل."</p>
                        <div class="testimonial-author">
                            <div class="author-image"></div>
                            <div class="author-info">
                                <h6>خالد عبدالله</h6>
                                <p>صاحب مطعم البرج</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title fade-in">ارتقي بإدارة أعمالك إلى مستوى جديد</h2>
            <p class="cta-subtitle fade-in">ابدأ رحلتك معنا اليوم</p>
            <button class="btn btn-primary-custom btn-lg">ابدأ تجربتك المجانية الآن</button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">BABL</h5>
                    <p>نظام متكامل لإدارة المطاعم والمقاهي بكفاءة واحترافية عالية</p>
                    <div class="social-icons mt-3">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">الشركة</h5>
                    <ul class="footer-links">
                        <li><a href="#">من نحن</a></li>
                        <li><a href="#">خدماتنا</a></li>
                        <li><a href="#">المدونة</a></li>
                        <li><a href="#">الوظائف</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">الدعم</h5>
                    <ul class="footer-links">
                        <li><a href="#">مركز المساعدة</a></li>
                        <li><a href="#">الأسئلة الشائعة</a></li>
                        <li><a href="#">تواصل معنا</a></li>
                        <li><a href="#">الدعم الفني</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="footer-title">قانوني</h5>
                    <ul class="footer-links">
                        <li><a href="#">الشروط والأحكام</a></li>
                        <li><a href="#">سياسة الخصوصية</a></li>
                        <li><a href="#">سياسة الاسترجاع</a></li>
                        <li><a href="#">الأمان</a></li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.1); margin: 2rem 0;">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2024 BABL. جميع الحقوق محفوظة</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar background on scroll
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').css('background', 'rgba(26, 35, 50, 0.98)');
            } else {
                $('.navbar').css('background', 'var(--dark-blue)');
            }
        });

        // Counter animation for stats
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    element.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target;
                }
            };

            updateCounter();
        }

        // Trigger counter animation when stats section is visible
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.querySelectorAll('.stat-number').forEach(stat => {
                        if (!stat.classList.contains('animated')) {
                            stat.classList.add('animated');
                            const text = stat.textContent.replace(/[^0-9]/g, '');
                            if (text) {
                                stat.setAttribute('data-target', text);
                                animateCounter(stat);
                            }
                        }
                    });
                }
            });
        }, {
            threshold: 0.5
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            statsObserver.observe(statsSection);
        }

        // Add hover effect to cards
        $('.feature-card, .service-card, .testimonial-card').hover(
            function() {
                $(this).css('transform', 'translateY(-10px)');
            },
            function() {
                $(this).css('transform', 'translateY(0)');
            }
        );

        // Button click effects
        $('.btn').on('click', function(e) {
            const ripple = $('<span class="ripple"></span>');
            $(this).append(ripple);

            const x = e.pageX - $(this).offset().left;
            const y = e.pageY - $(this).offset().top;

            ripple.css({
                left: x + 'px',
                top: y + 'px'
            });

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Add ripple effect CSS
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.5);
                width: 20px;
                height: 20px;
                animation: ripple-animation 0.6s ease-out;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(10);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Parallax effect for hero section
        $(window).scroll(function() {
            const scrolled = $(this).scrollTop();
            $('.hero-section').css('background-position', 'center ' + (scrolled * 0.5) + 'px');
        });

        // Lazy loading images (if needed)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img.lazy').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Mobile menu close on click
        $('.navbar-nav .nav-link').on('click', function() {
            if ($(window).width() < 992) {
                $('.navbar-collapse').collapse('hide');
            }
        });

        // Form validation (if forms are added)
        $('form').on('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            console.log('Form submitted');
        });

        // Add loading animation
        $(window).on('load', function() {
            $('body').addClass('loaded');
        });

        // Console welcome message
        console.log('%c Welcome to BABL! ', 'background: #FFB800; color: #1a2332; font-size: 20px; padding: 10px;');
    </script>
</body>

</html
