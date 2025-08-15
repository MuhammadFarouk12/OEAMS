namespace OEAMS
{
    partial class Students
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle1 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle2 = new System.Windows.Forms.DataGridViewCellStyle();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle3 = new System.Windows.Forms.DataGridViewCellStyle();
            this.txb_studentFirstName = new Guna.UI2.WinForms.Guna2TextBox();
            this.txb_studentLastName = new Guna.UI2.WinForms.Guna2TextBox();
            this.txb_studentMiddleNames = new Guna.UI2.WinForms.Guna2TextBox();
            this.txb_phoneNumber = new Guna.UI2.WinForms.Guna2TextBox();
            this.btn_addStudent = new Guna.UI2.WinForms.Guna2Button();
            this.btn_updateStudent = new Guna.UI2.WinForms.Guna2Button();
            this.btn_deleteStudent = new Guna.UI2.WinForms.Guna2Button();
            this.dgv_students = new Guna.UI2.WinForms.Guna2DataGridView();
            this.lbl_studentId = new Guna.UI2.WinForms.Guna2HtmlLabel();
            ((System.ComponentModel.ISupportInitialize)(this.dgv_students)).BeginInit();
            this.SuspendLayout();
            // 
            // txb_studentFirstName
            // 
            this.txb_studentFirstName.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.txb_studentFirstName.DefaultText = "";
            this.txb_studentFirstName.DisabledState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(208)))), ((int)(((byte)(208)))), ((int)(((byte)(208)))));
            this.txb_studentFirstName.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(226)))), ((int)(((byte)(226)))), ((int)(((byte)(226)))));
            this.txb_studentFirstName.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentFirstName.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentFirstName.FocusedState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentFirstName.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.txb_studentFirstName.HoverState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentFirstName.Location = new System.Drawing.Point(22, 19);
            this.txb_studentFirstName.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.txb_studentFirstName.Name = "txb_studentFirstName";
            this.txb_studentFirstName.PlaceholderText = "First Name";
            this.txb_studentFirstName.SelectedText = "";
            this.txb_studentFirstName.Size = new System.Drawing.Size(312, 34);
            this.txb_studentFirstName.TabIndex = 6;
            // 
            // txb_studentLastName
            // 
            this.txb_studentLastName.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.txb_studentLastName.DefaultText = "";
            this.txb_studentLastName.DisabledState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(208)))), ((int)(((byte)(208)))), ((int)(((byte)(208)))));
            this.txb_studentLastName.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(226)))), ((int)(((byte)(226)))), ((int)(((byte)(226)))));
            this.txb_studentLastName.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentLastName.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentLastName.FocusedState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentLastName.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.txb_studentLastName.HoverState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentLastName.Location = new System.Drawing.Point(342, 19);
            this.txb_studentLastName.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.txb_studentLastName.Name = "txb_studentLastName";
            this.txb_studentLastName.PlaceholderText = "Last Name";
            this.txb_studentLastName.SelectedText = "";
            this.txb_studentLastName.Size = new System.Drawing.Size(331, 34);
            this.txb_studentLastName.TabIndex = 7;
            this.txb_studentLastName.TextChanged += new System.EventHandler(this.guna2TextBox2_TextChanged);
            // 
            // txb_studentMiddleNames
            // 
            this.txb_studentMiddleNames.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.txb_studentMiddleNames.DefaultText = "";
            this.txb_studentMiddleNames.DisabledState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(208)))), ((int)(((byte)(208)))), ((int)(((byte)(208)))));
            this.txb_studentMiddleNames.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(226)))), ((int)(((byte)(226)))), ((int)(((byte)(226)))));
            this.txb_studentMiddleNames.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentMiddleNames.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_studentMiddleNames.FocusedState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentMiddleNames.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.txb_studentMiddleNames.HoverState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_studentMiddleNames.Location = new System.Drawing.Point(22, 63);
            this.txb_studentMiddleNames.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.txb_studentMiddleNames.Name = "txb_studentMiddleNames";
            this.txb_studentMiddleNames.PlaceholderText = "Middle Names";
            this.txb_studentMiddleNames.SelectedText = "";
            this.txb_studentMiddleNames.Size = new System.Drawing.Size(312, 34);
            this.txb_studentMiddleNames.TabIndex = 8;
            // 
            // txb_phoneNumber
            // 
            this.txb_phoneNumber.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.txb_phoneNumber.DefaultText = "";
            this.txb_phoneNumber.DisabledState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(208)))), ((int)(((byte)(208)))), ((int)(((byte)(208)))));
            this.txb_phoneNumber.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(226)))), ((int)(((byte)(226)))), ((int)(((byte)(226)))));
            this.txb_phoneNumber.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_phoneNumber.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_phoneNumber.FocusedState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_phoneNumber.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.txb_phoneNumber.HoverState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_phoneNumber.Location = new System.Drawing.Point(342, 63);
            this.txb_phoneNumber.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.txb_phoneNumber.Name = "txb_phoneNumber";
            this.txb_phoneNumber.PlaceholderText = "Phone Number";
            this.txb_phoneNumber.SelectedText = "";
            this.txb_phoneNumber.Size = new System.Drawing.Size(278, 34);
            this.txb_phoneNumber.TabIndex = 9;
            // 
            // btn_addStudent
            // 
            this.btn_addStudent.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btn_addStudent.DisabledState.BorderColor = System.Drawing.Color.DarkGray;
            this.btn_addStudent.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray;
            this.btn_addStudent.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(169)))), ((int)(((byte)(169)))), ((int)(((byte)(169)))));
            this.btn_addStudent.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(141)))), ((int)(((byte)(141)))), ((int)(((byte)(141)))));
            this.btn_addStudent.FillColor = System.Drawing.Color.DarkSeaGreen;
            this.btn_addStudent.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.btn_addStudent.ForeColor = System.Drawing.Color.White;
            this.btn_addStudent.Location = new System.Drawing.Point(22, 105);
            this.btn_addStudent.Name = "btn_addStudent";
            this.btn_addStudent.Size = new System.Drawing.Size(206, 45);
            this.btn_addStudent.TabIndex = 10;
            this.btn_addStudent.Text = "Add Student";
            // 
            // btn_updateStudent
            // 
            this.btn_updateStudent.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btn_updateStudent.DisabledState.BorderColor = System.Drawing.Color.DarkGray;
            this.btn_updateStudent.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray;
            this.btn_updateStudent.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(169)))), ((int)(((byte)(169)))), ((int)(((byte)(169)))));
            this.btn_updateStudent.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(141)))), ((int)(((byte)(141)))), ((int)(((byte)(141)))));
            this.btn_updateStudent.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.btn_updateStudent.ForeColor = System.Drawing.Color.White;
            this.btn_updateStudent.Location = new System.Drawing.Point(234, 105);
            this.btn_updateStudent.Name = "btn_updateStudent";
            this.btn_updateStudent.Size = new System.Drawing.Size(206, 45);
            this.btn_updateStudent.TabIndex = 11;
            this.btn_updateStudent.Text = "Update Student";
            // 
            // btn_deleteStudent
            // 
            this.btn_deleteStudent.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btn_deleteStudent.DisabledState.BorderColor = System.Drawing.Color.DarkGray;
            this.btn_deleteStudent.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray;
            this.btn_deleteStudent.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(169)))), ((int)(((byte)(169)))), ((int)(((byte)(169)))));
            this.btn_deleteStudent.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(141)))), ((int)(((byte)(141)))), ((int)(((byte)(141)))));
            this.btn_deleteStudent.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(0)))), ((int)(((byte)(0)))));
            this.btn_deleteStudent.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.btn_deleteStudent.ForeColor = System.Drawing.Color.White;
            this.btn_deleteStudent.Location = new System.Drawing.Point(446, 105);
            this.btn_deleteStudent.Name = "btn_deleteStudent";
            this.btn_deleteStudent.Size = new System.Drawing.Size(228, 45);
            this.btn_deleteStudent.TabIndex = 12;
            this.btn_deleteStudent.Text = "Delete Student";
            // 
            // dgv_students
            // 
            this.dgv_students.AllowUserToOrderColumns = true;
            dataGridViewCellStyle1.BackColor = System.Drawing.Color.White;
            this.dgv_students.AlternatingRowsDefaultCellStyle = dataGridViewCellStyle1;
            dataGridViewCellStyle2.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle2.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(100)))), ((int)(((byte)(88)))), ((int)(((byte)(255)))));
            dataGridViewCellStyle2.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            dataGridViewCellStyle2.ForeColor = System.Drawing.Color.White;
            dataGridViewCellStyle2.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle2.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle2.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.dgv_students.ColumnHeadersDefaultCellStyle = dataGridViewCellStyle2;
            this.dgv_students.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dataGridViewCellStyle3.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle3.BackColor = System.Drawing.Color.White;
            dataGridViewCellStyle3.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            dataGridViewCellStyle3.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(71)))), ((int)(((byte)(69)))), ((int)(((byte)(94)))));
            dataGridViewCellStyle3.SelectionBackColor = System.Drawing.Color.FromArgb(((int)(((byte)(231)))), ((int)(((byte)(229)))), ((int)(((byte)(255)))));
            dataGridViewCellStyle3.SelectionForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(71)))), ((int)(((byte)(69)))), ((int)(((byte)(94)))));
            dataGridViewCellStyle3.WrapMode = System.Windows.Forms.DataGridViewTriState.False;
            this.dgv_students.DefaultCellStyle = dataGridViewCellStyle3;
            this.dgv_students.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.dgv_students.GridColor = System.Drawing.Color.FromArgb(((int)(((byte)(231)))), ((int)(((byte)(229)))), ((int)(((byte)(255)))));
            this.dgv_students.Location = new System.Drawing.Point(0, 176);
            this.dgv_students.Name = "dgv_students";
            this.dgv_students.RowHeadersVisible = false;
            this.dgv_students.Size = new System.Drawing.Size(686, 190);
            this.dgv_students.TabIndex = 14;
            this.dgv_students.ThemeStyle.AlternatingRowsStyle.BackColor = System.Drawing.Color.White;
            this.dgv_students.ThemeStyle.AlternatingRowsStyle.Font = null;
            this.dgv_students.ThemeStyle.AlternatingRowsStyle.ForeColor = System.Drawing.Color.Empty;
            this.dgv_students.ThemeStyle.AlternatingRowsStyle.SelectionBackColor = System.Drawing.Color.Empty;
            this.dgv_students.ThemeStyle.AlternatingRowsStyle.SelectionForeColor = System.Drawing.Color.Empty;
            this.dgv_students.ThemeStyle.BackColor = System.Drawing.Color.White;
            this.dgv_students.ThemeStyle.GridColor = System.Drawing.Color.FromArgb(((int)(((byte)(231)))), ((int)(((byte)(229)))), ((int)(((byte)(255)))));
            this.dgv_students.ThemeStyle.HeaderStyle.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(100)))), ((int)(((byte)(88)))), ((int)(((byte)(255)))));
            this.dgv_students.ThemeStyle.HeaderStyle.BorderStyle = System.Windows.Forms.DataGridViewHeaderBorderStyle.None;
            this.dgv_students.ThemeStyle.HeaderStyle.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dgv_students.ThemeStyle.HeaderStyle.ForeColor = System.Drawing.Color.White;
            this.dgv_students.ThemeStyle.HeaderStyle.HeaightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgv_students.ThemeStyle.HeaderStyle.Height = 4;
            this.dgv_students.ThemeStyle.ReadOnly = false;
            this.dgv_students.ThemeStyle.RowsStyle.BackColor = System.Drawing.Color.White;
            this.dgv_students.ThemeStyle.RowsStyle.BorderStyle = System.Windows.Forms.DataGridViewCellBorderStyle.SingleHorizontal;
            this.dgv_students.ThemeStyle.RowsStyle.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.dgv_students.ThemeStyle.RowsStyle.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(71)))), ((int)(((byte)(69)))), ((int)(((byte)(94)))));
            this.dgv_students.ThemeStyle.RowsStyle.Height = 22;
            this.dgv_students.ThemeStyle.RowsStyle.SelectionBackColor = System.Drawing.Color.FromArgb(((int)(((byte)(231)))), ((int)(((byte)(229)))), ((int)(((byte)(255)))));
            this.dgv_students.ThemeStyle.RowsStyle.SelectionForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(71)))), ((int)(((byte)(69)))), ((int)(((byte)(94)))));
            // 
            // lbl_studentId
            // 
            this.lbl_studentId.BackColor = System.Drawing.Color.Transparent;
            this.lbl_studentId.Location = new System.Drawing.Point(627, 63);
            this.lbl_studentId.Name = "lbl_studentId";
            this.lbl_studentId.Size = new System.Drawing.Size(21, 22);
            this.lbl_studentId.TabIndex = 15;
            this.lbl_studentId.Text = "Id: ";
            // 
            // Students
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(9F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(686, 366);
            this.Controls.Add(this.lbl_studentId);
            this.Controls.Add(this.dgv_students);
            this.Controls.Add(this.btn_deleteStudent);
            this.Controls.Add(this.btn_updateStudent);
            this.Controls.Add(this.btn_addStudent);
            this.Controls.Add(this.txb_phoneNumber);
            this.Controls.Add(this.txb_studentMiddleNames);
            this.Controls.Add(this.txb_studentLastName);
            this.Controls.Add(this.txb_studentFirstName);
            this.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Margin = new System.Windows.Forms.Padding(4, 5, 4, 5);
            this.Name = "Students";
            this.Text = "Students";
            this.Load += new System.EventHandler(this.Students_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgv_students)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private Guna.UI2.WinForms.Guna2TextBox txb_studentFirstName;
        private Guna.UI2.WinForms.Guna2TextBox txb_studentLastName;
        private Guna.UI2.WinForms.Guna2TextBox txb_studentMiddleNames;
        private Guna.UI2.WinForms.Guna2TextBox txb_phoneNumber;
        private Guna.UI2.WinForms.Guna2Button btn_addStudent;
        private Guna.UI2.WinForms.Guna2Button btn_updateStudent;
        private Guna.UI2.WinForms.Guna2Button btn_deleteStudent;
        private Guna.UI2.WinForms.Guna2DataGridView dgv_students;
        private Guna.UI2.WinForms.Guna2HtmlLabel lbl_studentId;
    }
}