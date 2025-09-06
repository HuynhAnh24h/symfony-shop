# Cài đặc Symfony 7 
- {symfony new shop-app --webapp}

- Tailwind Css: 
    - {composer require symfonycasts/tailwind-bundle}
    - {php bin/console tailwind:init}

- Kết nối PosgerSQl: 
    - Kết nối Localhost PG_SQL.
    - Chạy lệnh {symfony console doctrine:database:create}

- Tạo cơ sở dữ liệu:
    - {php bin/console make:entity}
    - Tạo các trường, kiểu dữ liệu....

- Tạo mối quan hệ các bảng: relation ( ManyToOne, OneToMany, OneToOne, ManyToMany) 

- Tạo controller: php bin/console make:controller _your_controller

- Chạy project code: (symfony server:start) and run watch tailwind css (php bin/console tailwind:build --watch)