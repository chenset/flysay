<?php
/**
 * 调试函数
 * @param $value
 */
function f($value)
{
    if (env('APP_DEBUG')) {
        echo '<pre style="font-size: 12px;">', var_export($value, true), '</pre>';
    }
}

/**
 * 获取指定字段枚举值的列表
 * 有30天的缓存, 为空时不缓存
 * @param $table
 * @param $column
 * @return array
 */
function get_enum_values($table, $column)
{
    return \Illuminate\Support\Facades\Cache::remember(__FUNCTION__ . $table . $column, 24 * 60 * 30, function () use ($table, $column) {

        //避免table参数 sql注入
        $validator = \Illuminate\Support\Facades\Validator::make(['table' => $table], ['table' => 'alpha_dash']);
        if ($validator->fails()) {
            return [];
        }

        //重新从数据库获取数据
        $res = \Illuminate\Support\Facades\DB::select("SHOW COLUMNS FROM {$table} where Field = ?;", [$column]);
        if (count($res) === 0) {
            return [];
        }
        if (empty($res[0]['Type'])) {
            return [];
        }
        if (!starts_with($res[0]['Type'], "enum('")) {
            return [];
        }

        $enumStr = substr($res[0]['Type'], 6);

        $enumStr = substr($enumStr, 0, -2);

        $enumArr = explode("','", $enumStr);

        return $enumArr;
    });
}

function read_file($path)
{
    if (!file_exists($path)) {
        die('file_not_exists');
    }

    $file_ext = pathinfo($path, PATHINFO_EXTENSION);
    $file_size = filesize($path);
    $file_name = md5(time() . rand(1000, 9999)) . '.' . $file_ext;

    header("Content-type: application/force-download");
    header('Content-Type: application/octet-stream');
    header("Content-Disposition: filename=$file_name");
    header("Content-Length: " . $file_size);

    readfile($path);
    exit;
}

/**
 * 递归创建目录
 * @example create_dir(dirname('/a/b/c/d/file.ext'))
 * @param $path
 * @param int $permission
 */
function create_dir($path, $permission = 0755)
{
    if (!file_exists($path)) {
        create_dir(dirname($path), $permission);
        mkdir($path, $permission);
    }
}
