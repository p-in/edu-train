<template>
    <div class="user-list">
        <el-row>
            <el-col class="search" :span="24">
                <el-form :inline="true" :model="formInline" class="demo-form-inline">
                    <el-form-item>
                        <el-input v-model="formInline.user" placeholder="用户id或名称"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-select v-model="formInline.region" placeholder="用户等级">
                            <el-option label="vip" value="1"></el-option>
                            <el-option label="普通用户" value="2"></el-option>
                        </el-select>
                    </el-form-item>

                    <el-form-item>
                        <el-button type="primary" @click="onSubmit">查询</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
            <el-col class="container" :span="24">
                <el-table style="width: 100%"
                        :data="tableData.filter(data => !search || data.username.toLowerCase().includes(search.toLowerCase()))">
                    <el-table-column align="center" label="ID" prop="id"></el-table-column>
                    <el-table-column align="center" label="用户名" prop="username"></el-table-column>
                    <el-table-column align="center" label="性别" prop="gender"></el-table-column>
                    <el-table-column align="center" label="email" prop="email"></el-table-column>
                    <el-table-column align="center" label="头像" prop="avatar"></el-table-column>
                    <el-table-column align="center" label="最后登录时间" prop="last_login_time"></el-table-column>
                    <el-table-column align="center" label="最后登录IP" prop="last_login_ip"></el-table-column>
                    <el-table-column align="center">
                        <template slot-scope="scope">
                            <el-button
                                    size="mini"
                                    @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
                            <el-button
                                    size="mini"
                                    type="danger"
                                    @click="handleDelete(scope.$index, scope.row)">删除</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <div class="pagination">
                    <el-pagination
                            background
                            layout="prev, pager, next"
                            :total="1000">
                    </el-pagination>
                </div>
            </el-col>
                <el-dialog title="用户信息" :visible.sync="dialogFormVisible">
                    <el-form :model="form">
                        <el-form-item label="用户id" :label-width="formLabelWidth">
                            <el-input v-model="form.id" disabled autocomplete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="用户名" :label-width="formLabelWidth">
                            <el-input v-model="form.username" autocomplete="off"></el-input>
                        </el-form-item>
                        <el-form-item label="用户头像" :label-width="formLabelWidth">
                            <el-image
                                    style="width: 100px; height: 100px"
                                    :src="url"
                                    :fit="fit"></el-image>
                        </el-form-item>
                        <el-form-item label="用户性别" :label-width="formLabelWidth">
                            <el-radio-group v-model="form.gender">
                                <el-radio :label="1">男</el-radio>
                                <el-radio :label="2">女</el-radio>
                                <el-radio :label="3">保密</el-radio>
                            </el-radio-group>
                        </el-form-item>
                    </el-form>
                    <div slot="footer" class="dialog-footer">
                        <el-button @click="dialogFormVisible = false">取 消</el-button>
                        <el-button type="primary" @click="dialogFormVisible = false">确 定</el-button>
                    </div>
                </el-dialog>
        </el-row>
    </div>
</template>

<script>
  export default {
    name: "Index",
    data() {
      return {
        dialogFormVisible : false,
        formLabelWidth: '120px',
        visible2: false,
        form: {
          id: 0,
          username: '',
          avatar: '',
          gender: 2,
        },
        formInline: {
          user: '',
          region: ''
        },
        tableData: [{
          id: '1',
          username: '王小虎',
          gender: '男',
          email: 'admin@admin.com',
          avatar: '../static/images/user.png',
          last_login_time:'2019-05-20 10:00:00',
          last_login_ip: '127.0.0.1',
        }, {
          id: '1',
          username: '王小虎',
          gender: '男',
          email: 'admin@admin.com',
          avatar: '../static/images/user.png',
          last_login_time:'2019-05-20 10:00:00',
          last_login_ip: '127.0.0.1',
        }, {
          id: '1',
          username: '王小虎',
          gender: '男',
          email: 'admin@admin.com',
          avatar: '../static/images/user.png',
          last_login_time:'2019-05-20 10:00:00',
          last_login_ip: '127.0.0.1',
        }, {
          id: '1',
          username: '王小虎',
          gender: '男',
          email: 'admin@admin.com',
          avatar: '../static/images/user.png',
          last_login_time:'2019-05-20 10:00:00',
          last_login_ip: '127.0.0.1',
        }],
        radio: 1,
      }
    },
    methods: {
      onSubmit() {
        console.log('submit!');
      },
      handleEdit(index, row) {
        this.dialogFormVisible = true;
      },
      handleDelete(index, row) {
        this.$confirm('此操作将永久删除此用户, 是否继续?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          // 发送请求 删除数据
          this.$message({
            type: 'success',
            message: '删除成功!'
          });
        });
      }
    }
  }
</script>

<style scoped>
    .search{
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);
        margin: 20px 0;
        vertical-align: center;
        padding-left: 20px;
    }
    .search .el-form-item{
        margin-top: 22px;
    }
    .container{
        padding:20px;
        border-radius: 10px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, .12), 0 0 6px rgba(0, 0, 0, .04);
    }
    .container .pagination{
        padding-top:20px;
    }
</style>