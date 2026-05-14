CREATE TABLE admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- كلمة المرور: admin123
-- ملاحظة: تم استخدام password_hash في PHP، وهذا الهاش صالح لكلمة admin123
INSERT INTO admins (username, password) VALUES
('admin', '$2y$10$CwTycUXWue0Thq9StjUM0uJ8S2aARj96qDtuufXiQHsEZ8lKxWFKy');

CREATE TABLE regions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    category VARCHAR(100) NOT NULL,
    short_description VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    history TEXT NOT NULL,
    culture TEXT NOT NULL,
    landmarks TEXT NOT NULL,
    main_image VARCHAR(500) NOT NULL,
    image_one VARCHAR(500) NOT NULL,
    image_two VARCHAR(500) NOT NULL,
    image_three VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

INSERT INTO regions
(name, category, short_description, description, history, culture, landmarks, main_image, image_one, image_two, image_three)
VALUES
(
'الرياض',
'مدينة',
'عاصمة المملكة ومركزها السياسي والاقتصادي.',
'الرياض مدينة حديثة تجمع بين التطور العمراني والهوية السعودية الأصيلة. تتميز بالمراكز التجارية، المتاحف، المواقع التاريخية، والفعاليات الثقافية.',
'تطورت الرياض من بلدة تاريخية صغيرة إلى عاصمة كبرى للمملكة العربية السعودية، وارتبط تاريخها بقصر المصمك وبداية توحيد المملكة.',
'تعكس الرياض الثقافة النجدية من خلال العمارة التقليدية، الأكلات الشعبية، الأسواق التراثية، والمناسبات الوطنية.',
'برج المملكة، قصر المصمك، الدرعية التاريخية، المتحف الوطني',
'https://images.unsplash.com/photo-1586724237569-f3d0c1dee8c6?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1591788404017-3a451f1f5774?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1609770231080-e321deccc34c?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1565967511849-76a60a516170?auto=format&fit=crop&w=900&q=80'
),
(
'مكة المكرمة',
'دينية',
'مدينة مقدسة ومقصد المسلمين من جميع أنحاء العالم.',
'مكة المكرمة هي أطهر البقاع وفيها المسجد الحرام والكعبة المشرفة. تعد مركزاً روحياً مهماً وتستقبل ملايين الزوار للحج والعمرة.',
'ارتبط تاريخ مكة المكرمة ببناء الكعبة المشرفة وبداية الرسالة الإسلامية، وما زالت تحتفظ بمكانتها الدينية العظيمة.',
'تتميز مكة بثقافة الضيافة وخدمة الحجاج والمعتمرين، وتنوع سكانها وزوارها من مختلف الشعوب الإسلامية.',
'المسجد الحرام، الكعبة المشرفة، جبل النور، غار حراء',
'https://images.unsplash.com/photo-1591604129939-f1efa4d9f7fa?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1589302168068-964664d93dc0?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1564769662533-4f00a87b4056?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1542816417-0983c9c9ad53?auto=format&fit=crop&w=900&q=80'
),
(
'العلا',
'تراثية',
'وجهة تاريخية تحتوي على آثار ومواقع تراثية فريدة.',
'العلا من أهم الوجهات السياحية في المملكة، وتشتهر بتكويناتها الصخرية ومدائن صالح والمواقع الأثرية التي تعكس حضارات قديمة.',
'شهدت العلا مرور حضارات قديمة مثل الأنباط، وتضم مدائن صالح المسجلة ضمن مواقع التراث العالمي.',
'تتميز العلا بالفنون التراثية، الحرف اليدوية، المزارع، والفعاليات الثقافية في بيئة صحراوية مميزة.',
'مدائن صالح، جبل الفيل، البلدة القديمة، وادي عشار',
'https://images.unsplash.com/photo-1572252009286-268acec5ca0a?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1584551246679-0daf3d275d0f?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1587135991058-8816b028691f?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1578148080447-f1584d97f26a?auto=format&fit=crop&w=900&q=80'
),
(
'جدة',
'ساحلية',
'مدينة ساحلية على البحر الأحمر وبوابة الحرمين.',
'جدة مدينة نابضة بالحياة تجمع بين البحر، الأسواق القديمة، المطاعم، والفنون الحديثة. تعد واجهة سياحية وثقافية مهمة.',
'عرفت جدة تاريخياً بأنها ميناء مهم للحجاج والتجارة، وتضم منطقة جدة التاريخية ذات البيوت القديمة والرواشين.',
'تتميز جدة بثقافة بحرية وحجازية واضحة، وتظهر في الطعام، اللهجة، العمارة، والفنون.',
'جدة التاريخية، كورنيش جدة، نافورة الملك فهد، البلد',
'https://images.unsplash.com/photo-1586724237569-f3d0c1dee8c6?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1518005020951-eccb494ad742?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80'
),
(
'أبها',
'طبيعية',
'مدينة جبلية جميلة في منطقة عسير.',
'أبها تتميز بأجوائها المعتدلة وطبيعتها الجبلية الخضراء، وتعد من أبرز الوجهات السياحية الصيفية في المملكة.',
'تحتفظ أبها ومناطق عسير بتاريخ معماري وثقافي غني، وتشتهر بالقرى التراثية والمباني الملونة.',
'تظهر ثقافة عسير في الفنون الشعبية، الأزياء التقليدية، النقوش الجدارية، والأكلات الجنوبية.',
'جبل السودة، قرية رجال ألمع، منتزه عسير الوطني، شارع الفن',
'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&fit=crop&w=900&q=80'
),
(
'تبوك',
'طبيعية',
'منطقة تجمع بين الجبال والسواحل والتاريخ.',
'تبوك تقع شمال غرب المملكة وتتميز بتنوع طبيعي كبير، من الجبال والوديان إلى السواحل القريبة من البحر الأحمر.',
'مرّت تبوك بمحطات تاريخية مهمة، وتضم آثاراً وقلاعاً وأسواقاً قديمة تعكس أهميتها كممر تاريخي.',
'تتميز بثقافة شمالية أصيلة وكرم الضيافة، إضافة إلى ارتباطها بالمناطق الصحراوية والساحلية.',
'قلعة تبوك، وادي الديسة، نيوم، شواطئ حقل',
'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80',
'https://images.unsplash.com/photo-1483728642387-6c3bdd6c93e5?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80',
'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=900&q=80'
);