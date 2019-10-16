const gulp=require("gulp");
const sass=require("gulp-sass")

//复制项目下的所有代码复制到服务器下的发布目录下
    gulp.task('copyfile',async ()=>{
        gulp.src('./**/*')
        .pipe(gulp.dest('D:\\phpStudy\\WWW\\xiangmu'));
    })


//执行监听sass任务
gulp.task('watchall',async ()=>{
    //监听scss
    gulp.watch('sass/**/*',async ()=>{
        gulp.src('sass/**/*')
        .pipe(sass())
        .pipe(gulp.dest('D:\\phpStudy\\WWW\\xiangmu\\css'));
    });
   //监听demo
    gulp.watch('demo/**/*',async ()=>{
        gulp.src('demo/**/*')
        .pipe(gulp.dest('D:\\phpStudy\\WWW\\xiangmu\\demo'));
    });
    //监听js
    gulp.watch('js/**/*',async ()=>{
        gulp.src('js/**/*')
        .pipe(gulp.dest('D:\\phpStudy\\WWW\\xiangmu\\js'));
    });
});

