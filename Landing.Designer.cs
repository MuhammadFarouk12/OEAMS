namespace OEAMS
{
    partial class Landing
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
            this.Title = new Guna.UI2.WinForms.Guna2HtmlLabel();
            this.btn_enterSystem = new Guna.UI2.WinForms.Guna2GradientButton();
            this.txb_adminPassword = new Guna.UI2.WinForms.Guna2TextBox();
            this.SuspendLayout();
            // 
            // Title
            // 
            this.Title.BackColor = System.Drawing.Color.Transparent;
            this.Title.Font = new System.Drawing.Font("Microsoft Sans Serif", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.Title.ForeColor = System.Drawing.Color.CornflowerBlue;
            this.Title.Location = new System.Drawing.Point(132, 22);
            this.Title.Name = "Title";
            this.Title.Size = new System.Drawing.Size(452, 22);
            this.Title.TabIndex = 0;
            this.Title.Text = "Welcome To The Online English Academy Management System";
            this.Title.Click += new System.EventHandler(this.guna2HtmlLabel1_Click);
            // 
            // btn_enterSystem
            // 
            this.btn_enterSystem.Cursor = System.Windows.Forms.Cursors.Hand;
            this.btn_enterSystem.DisabledState.BorderColor = System.Drawing.Color.DarkGray;
            this.btn_enterSystem.DisabledState.CustomBorderColor = System.Drawing.Color.DarkGray;
            this.btn_enterSystem.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(169)))), ((int)(((byte)(169)))), ((int)(((byte)(169)))));
            this.btn_enterSystem.DisabledState.FillColor2 = System.Drawing.Color.FromArgb(((int)(((byte)(169)))), ((int)(((byte)(169)))), ((int)(((byte)(169)))));
            this.btn_enterSystem.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(141)))), ((int)(((byte)(141)))), ((int)(((byte)(141)))));
            this.btn_enterSystem.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.btn_enterSystem.ForeColor = System.Drawing.Color.White;
            this.btn_enterSystem.Location = new System.Drawing.Point(132, 196);
            this.btn_enterSystem.Name = "btn_enterSystem";
            this.btn_enterSystem.Size = new System.Drawing.Size(452, 45);
            this.btn_enterSystem.TabIndex = 1;
            this.btn_enterSystem.Text = "Enter The System";
            this.btn_enterSystem.Click += new System.EventHandler(this.btn_enterSystem_Click);
            // 
            // txb_adminPassword
            // 
            this.txb_adminPassword.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.txb_adminPassword.DefaultText = "";
            this.txb_adminPassword.DisabledState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(208)))), ((int)(((byte)(208)))), ((int)(((byte)(208)))));
            this.txb_adminPassword.DisabledState.FillColor = System.Drawing.Color.FromArgb(((int)(((byte)(226)))), ((int)(((byte)(226)))), ((int)(((byte)(226)))));
            this.txb_adminPassword.DisabledState.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_adminPassword.DisabledState.PlaceholderForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(138)))), ((int)(((byte)(138)))), ((int)(((byte)(138)))));
            this.txb_adminPassword.FocusedState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_adminPassword.Font = new System.Drawing.Font("Segoe UI", 9F);
            this.txb_adminPassword.HoverState.BorderColor = System.Drawing.Color.FromArgb(((int)(((byte)(94)))), ((int)(((byte)(148)))), ((int)(((byte)(255)))));
            this.txb_adminPassword.Location = new System.Drawing.Point(132, 142);
            this.txb_adminPassword.Name = "txb_adminPassword";
            this.txb_adminPassword.PlaceholderText = "Enter the admin password";
            this.txb_adminPassword.SelectedText = "";
            this.txb_adminPassword.Size = new System.Drawing.Size(452, 36);
            this.txb_adminPassword.TabIndex = 2;
            // 
            // Landing
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(686, 366);
            this.Controls.Add(this.txb_adminPassword);
            this.Controls.Add(this.btn_enterSystem);
            this.Controls.Add(this.Title);
            this.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.Name = "Landing";
            this.Text = "OEAMS";
            this.Load += new System.EventHandler(this.Landing_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private Guna.UI2.WinForms.Guna2HtmlLabel Title;
        private Guna.UI2.WinForms.Guna2GradientButton btn_enterSystem;
        private Guna.UI2.WinForms.Guna2TextBox txb_adminPassword;
    }
}

